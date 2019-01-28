<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientErrorResponseException;

use App\SetMaterial;
use App\Guz;
use App\Services;
use function GuzzleHttp\json_encode;

class MaterialUserController extends Controller
{
    public function index() {
        return view('material_user/index');
    }

    public function create() {
        return view('material_user/add');
    }

    public function get_tm_material() {

        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_materials/union/".(!empty($_REQUEST['search']) ? $_REQUEST['search'] : '')
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
         if ($data->status === "success") {
           
            //foreach ($data->data as $row) {
                
                /* 
                if ($no > 1) {
                    $json .= ",";
                }

                if (!empty($row->no_document)) {
                    $img = $this->getThumbnail($row->no_document);
                } else {
                    $img = '';
                }

                $arr = array(
                    "img" => $img,
                    "no_material" => $row->no_material,
                    "industri_sector" => $row->industri_sector,
                    "plant" => $row->plant,
                    "store_loc" => $row->store_loc,
                    "sales_org" => $row->sales_org,
                    "dist_channel" => $row->dist_channel,
                    "mat_group" => $row->mat_group,
                    "part_number" => $row->part_number,
                    "spec" => $row->spec,
                    "merk" => $row->merk,
                    "material_name" => $row->material_name,
                    "uom" => $row->uom,
                    "division" => $row->division,
                    "item_cat_group" => $row->item_cat_group,
                    "gross_weight" => $row->gross_weight,
                    "net_weight" => $row->net_weight,
                    "volume" => $row->volume,
                    "size_dimension" => $row->size_dimension,
                    "weight_unit" => $row->weight_unit,
                    "volume_unit" => $row->volume_unit,
                    "locat" => $row->locat,
                    "mrp_controller" => $row->mrp_controller,
                    "valuation_class" => $row->valuation_class,
                    "tax_classification" => $row->tax_classification,
                    "account_assign" => $row->account_assign,
                    "general_item" => $row->general_item,
                    "avail_check" => $row->avail_check,
                    "transportation_group" => $row->transportation_group,
                    "loading_group" => $row->loading_group,
                    "profit_center" => $row->profit_center,
                    "mrp_type" => $row->mrp_type,
                    "cash_discount" => $row->cash_discount,
                    "price_unit" => $row->price_unit,
                    "description" => $row->description,
                    "material_type" => $row->material_type,
                    "src" => $row->src,
                    "remarks" => $row->remarks
                );

                $json .= json_encode($arr);
                $no++;
                if ($no == 9) {
                    break;
                }*/
           // } 
        }

    }

    public function getThumbnail($no_document)
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_files/' . $no_document
        ));
        $data = $service->result;
        if ($data->status === "failed") {
          return '';
        }else{
            return $data->data->file_image;
        }
    }
 
    public function get_image()
    {
        $no_document = $_REQUEST['no_document'];
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_files/' . $no_document
        ));
        $res = $service->result;
        echo "<img src='". $res->data->file_image ."' style='width:50%;height:auto'>";   
    }

    public function get_auto_sugest()
    {
        $result = array();
        $service = new Services(array(
            'request'=> 'GET',
            'method'=> 'tr_materials/union'
        ));

        $res = $service->result;
        if($res->status === 'success') {
            foreach ($res->data as $key => $value) {
                if(!in_array($value->no_material, $result)){
                    $result = array_merge($result, array($value->no_material));
                }
            } 
            
            foreach ($res->data as $key => $value) {
                if(!in_array($value->material_name, $result)){
                    $result = array_merge($result, array($value->material_name));
                }
            } 
        }
        return response()->json(array('data'=>$result));
    }

    public function store(Request $request)
    {
        $no_document = rand(1, 1000000);
        $param = array(
            "no_document" => $no_document,
            "industri_sector" => $request->industry_sector,
            "plant" => $request->plant,
            "store_loc" => $request->store_location,
            "sales_org" => $request->sales_org,
            "dist_channel" => $request->dist_channel,
            "mat_group" => $request->group_material,
            "part_number" => $request->part_no,
            "spec" => $request->specification,
            "merk" => $request->merk,
            "material_name" => $request->material_sap,
            "description" => $request->description,
            "uom" => $request->uom,
            "division" => $request->division,
            "item_cat_group" => $request->item_category_group,
            "gross_weight" => $request->gross_weight,
            "net_weight" => $request->net_weight,
            "volume" => $request->volume,
            "size_dimension" => $request->size,
            "weight_unit" => $request->weight_unit,
            "volume_unit" => $request->volume_unit,
            "mrp_controller" => $request->mrp_controller,
            "valuation_class" => $request->valuation_class,
            "tax_classification" => $request->tax_classification,
            "tax_classification" => 1,
            "account_assign" => $request->account_assign,
            "general_item" => $request->general_item_category_group,
            "avail_check" => $request->availability_check,
            "transportation_group" => $request->transportation_group,
            "loading_group" => $request->loading_group,
            "profit_center" => $request->profit_center,
            "mrp_type" => $request->mrp_type,
            "period_sle" => $request->period_ind_for_sle,
            "cash_discount" => $request->cash_discount,
            "price_unit" => $request->price_unit,
            "locat" => $request->location,
            "remarks" => $request->remarks
        );

        $service = new Services(array(
            'request' => 'POST',
            'method' => 'tr_materials',
            'data'=> $param
        ));
        $res = $service->result;        
        if($res->code == '201'){
            foreach ($_FILES as $row) {
                if($row["name"]) {
                    $name = $row["name"];
                    $size = $row["size"];
                    $path = $row["tmp_name"];
                    $type = pathinfo($row["tmp_name"], PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    $files = array(
                        "no_document" => $no_document,
                        "file_name" => $name,
                        'material_no' => '-',
                        "doc_size" => $size,
                        "file_category" => $type,
                        "file_image" => $base64
                    );

                    $service = new Services(array(
                        'request' => 'POST',
                        'method' => 'tr_files',
                        'data' => $files
                    ));
                    $res = $service->result;          
                    if ($res->code == '201') {
                        $status = true;
                    } else {
                        $status = false;
                        echo json_encode(array(
                            "code" => 201,
                            "status" => "gagal upload",
                            "message" => $files
                        ));
                        break;
                    }
                }
            }
        }
       
        echo json_encode(array(
            'code' => 201,
            "message" => "berhasil"
        ));
    }  
    
    public function get_uom()
    {
        $service = new Services(array(
            'request' => 'GET',
            'host'=> 'ldap',
            'method' => "uom"
        ));
        $data = $service->result;
        $arr = array();
        foreach($data->data as $row) {
            $arr[] = array(
                'id'=> $row->MSEHI,
                'text'=> $row->MSEHI .'-'. $row->MSEHL
            );
        }
        return response()->json(array('data'=> $arr));
    }
   
    public function get_store_location(Request $request)
    {
        var_dump($request->id);
       
    }
   
    public function get_div() {
        $data = DB::table('tm_general_data')->where("general_code","div")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
    
    public function get_plant() {
        $data = DB::table('tm_general_data')->where("general_code","plant")->get();
        $arr = array();    
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
   
    public function get_location() {
        $data = DB::table('tm_general_data')->where("general_code", "location")->get();

        $arr = array();
        foreach ($data as $row) {
        
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
   
    public function get_mrp_controller() {
        $data = DB::table('tm_general_data')->where("general_code", "mrp_controller")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function get_valuation_class() {
        $data = DB::table('tm_general_data')->where("general_code", "valuation_class")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
    
    public function get_industry_sector() {
        $data = DB::table('tm_general_data')->where("general_code", "industry_sector")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function get_material_type() {
        $data = DB::table('tm_general_data')->where("general_code", "material_type")->get();

        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
    
    public function get_sales_org() {
        $data = DB::table('tm_general_data')->where("general_code", "sales_org")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr)); 
    }

    public function get_dist_channel() {
        $data = DB::table('tm_general_data')->where("general_code", "dist_channel")->get();

        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
    
    public function get_item_cat() {
        $data = DB::table('tm_general_data')->where("general_code", "item_cat")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
   
    public function get_tax_classification() {
        $data = DB::table('tm_general_data')->where("general_code", "tax_class")->get();
        $arr = array();
          foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
  
    public function get_account_assign() {
        $data = DB::table('tm_general_data')->where("general_code", "account_assign")->get();
        $arr = array();
          foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));  
    }

    public function get_availability_check() {
        $data = DB::table('tm_general_data')->where("general_code", "avail_check")->get();

        $arr = array();
          foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
 
    public function get_transportation_group() {
        $data = DB::table('tm_general_data')->where("general_code", "trans_group")->get();

        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
 
    public function get_loading_group() {
        $data = DB::table('tm_general_data')->where("general_code", "loading_group")->get();
        $arr = array();
          foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function get_profit_center() {
        $data = DB::table('tm_general_data')->where("general_code", "profit_center")->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
   
    public function get_mrp_type() {
        $data = DB::table('tm_general_data')->where("general_code", "mrp_type")->get();

        $arr = array();
          foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }
   
    public function get_sle() {
        $data = DB::table('tm_general_data')->where("general_code", "sle")->get();
        foreach ($data as $row) {
            $arr[] = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function show(Request $request) {
        $service = new Services(array(
            'request' => 'GET',
            'host' => 'ldap',
            'method' => "store_loc/" . $_REQUEST["id"]
        ));
        $data = $service->result;
        foreach ($data->data as $row) {
            $arr[] = array(
                "id" => $row->LGOR,
                "text" => $row->LGOR . " - " . str_replace("_", " ", $row->LGOBE)
            );
        }
        return response()->json(array('data' => $arr));

    }

    public function groupMaterialGroup()
    { 
        $data = DB::table('group_materials')->select('id', 'name', 'code', 'description', 'status')->where(array('status'=>0, 'code'=>$_REQUEST['code']))->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "no" => $no,
                "id" => $row->id,
                "name" => $row->code,
                "description" => $row->description,
            );
        }
        return response()->json(array('data' => $arr));
    }



}
