<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;

use App\SetMaterial;
use App\Guz;
use function GuzzleHttp\json_encode;

class MaterialUserController extends Controller
{
    public function index() {
        return view('material');
    }

    public function get_tm_material() {
        $header = array(
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
        );    

        $url = "http://149.129.224.117:8080/api/tr_materials/union/";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, array('headers'=>$header));

        $result = $response->getBody()->getContents();
        $data = json_decode($result);

        $no = 1;
        $json = '{"data":[';
        foreach($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }

            if(!empty($row->no_document)) {
                //$img = $this->getThumbnail($row->no_document);
                $img = $this->getThumbnail('661393');
            }else{
                $img = '';
            }
            $detail = '';
            $arr =array(
                "img"=> $img,
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
                //"period_sle" => $row->period_sle,
                "cash_discount" => $row->cash_discount,
                "price_unit" => $row->price_unit,
                "description" => $row->description,
                "material_type" => $row->material_type,
                "src" => $row->src
            );

            $json .= json_encode($arr);
            $no++;
            if($no == 5) {
                break;
            }
        }
        $json .= ']}';
       echo $json;
    }

    public function getThumbnail($no_document)
    {
        $header = array(
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
        );
        $url = "http://149.129.224.117:8080/api/tr_files/". $no_document;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, array('headers'=> $header));

        $result = $response->getBody()->getContents();
        $data = json_decode($result);

        return $data->file_image; 
    }
 
    public function get_image()
    {
        $no_document = $_REQUEST['no_document'];
        $url = "http://149.129.224.117:8080/api/tr_files/". $no_document;
        $client = new \GuzzleHttp\Client();
        $header = array(
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
        );
        

        $response = $client->request('GET', $url, array('headers'=> $header));
        $result = $response->getBody()->getContents();
        $data = json_decode($result);
        echo "<img src='". $data->file_image ."'>";
        
    }

    public function get_auto_sugest()
    {
        $header = array(
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
        );    
        $url = "http://149.129.224.117:8080/api/tr_materials/union/";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url, array('headers'=> $header));

        $result = $response->getBody()->getContents();
        $data = json_decode($result);

        $no = 1;
        $json = '{"data":';
        $result = array();
        foreach ($data as $key => $value) {
            $result = array_merge($result, array($value->no_material, $value->material_name));
        } 


        $json .= json_encode($result);
        $json .= '}';
        echo $json;
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
            "merk" => $request->brand,
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
            "no_material" => $request->material_no,
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
            "locat" => $request->location
        );
        $header = array(
            'Content-Type' => 'application/json',
            'AccessToken' => 'key',
            'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
        );

        $url = "http://149.129.224.117:8080/api/tr_materials";
        $client = new Client();
        $res = $client->request('POST', $url, [
            'json' => $param,
            'headers' => [
                'Content-Type' => 'application/json',
                'AccessToken' => 'key',
                'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
            ]
        ]);


        $save_material =  json_decode($res->getBody()->getContents());
        if($save_material->code == '201'){
            foreach ($_FILES as $row) {
                $name = $row["name"];
                $size = $row["size"];
                $path = $row["tmp_name"];
                $type = pathinfo($row["tmp_name"], PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                $files = array(
                    "material_no" => $request->group_material,
                    "no_document" => $no_document,
                    "file_name" => $name,
                    "doc_size" => $size,
                    "file_category" => $type,
                    "file_image" => $base64
                );

                $url = "http://149.129.224.117:8080/api/tr_files";
                $tr_files = new Client();
                $res = $tr_files->request('POST', $url, [
                    'json' => $files,
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'AccessToken' => 'key',
                        'Authorization' => 'Bearer e8NDkyjDgqvapG5XnIH6nVgq3QJTkwcTg6MpRlYVRpn3oOojoSmZaV54bYug6XfUfTQzmX37XzLoMEHLSNYqV53NuT2PcHFblFFi'
                    ]
                ]);

                $save_tr_files = json_decode($res->getBody()->getContents());
                if ($save_material->code == '201') {
                    $status = true;
                }else{
                    $status = false;
                    echo json_encode(array(
                            "code" => 201,
                            "status" => "gagal upload",
                            "message" => $files
                        )
                    );
                    break;
                }
            }
        }
       
        echo $res->getBody();
    }  
    
    public function get_uom()
    {
        $url = "http://tap-ldapdev.tap-agri.com/data-sap/uom";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        $result = $response->getBody()->getContents();
        $data = json_decode($result);
        $json = '{"data":[';

        for ($i = 0; $i < count($data->data); $i++) {

            if ($i > 0) {
                $json .= ",";
            }
            $arr = array(
                "id" => $data->data[$i]->MSEHL,
                "text" => $data->data[$i]->MSEHI . " - " . str_replace("_", " ", $data->data[$i]->MSEHL)
            );
            $json .= json_encode($arr);
        }

        $json .= "]}";
        echo $json; 
    }
   
    public function get_store_location(Request $request)
    {
        var_dump($request->id);
       
    }
   
    public function get_div() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code","div")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
    
    public function get_plant() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code","plant")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
   
    public function get_location() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "location")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
   
    public function get_mrp_controller() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "mrp_controller")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function get_valuation_class() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "valuation_class")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
    
    public function get_industry_sector() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "industry_sector")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function get_material_type() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "material_type")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
    
    public function get_sales_org() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "sales_org")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function get_dist_channel() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "dist_channel")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
    
    public function get_item_cat() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "item_cat")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
   
    public function get_tax_classification() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "tax_class")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
  
    public function get_account_assign() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "account_assign")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function get_availability_check() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "avail_check")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
 
    public function get_transportation_group() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "trans_group")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
 
    public function get_loading_group() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "loading_group")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function get_profit_center() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "profit_center")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
   
    public function get_mrp_type() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "mrp_type")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }
   
    public function get_sle() {
        $json = '{"data":[';
        $data = DB::table('tm_general_data')->where("general_code", "sle")->get();

        $no = 1;
          foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $row->description_code,
                "text"=> $row->description_code ." - ". $row->description
            );
            
            $json .= json_encode($arr);
            $no++;
        }
        $no++;
        $json .= ']}';
        echo $json;  
    }

    public function show(Request $request) {
        $url = "http://tap-ldapdev.tap-agri.com/data-sap/store_loc/2121" . $_REQUEST["id"];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        $result = $response->getBody()->getContents();
        $data = json_decode($result);
        $json = '{"data":[';

        for ($i = 0; $i < count($data->data); $i++) {

            if ($i > 0) {
                $json .= ",";
            }
            $arr = array(
                "id" => $data->data[$i]->LGOR,
                "text" => $data->data[$i]->LGOR . " - " . str_replace("_", " ", $data->data[$i]->LGOBE)
            );
            $json .= json_encode($arr);
        }

        $json .= "]}";
        echo $json; 
    }

    public function groupMaterialGroup()
    { 
        $data = DB::table('group_materials')->select('id', 'name', 'code', 'description', 'status')->where(array('status'=>0, 'code'=>$_REQUEST['code']))->get();
        $json = '{"data":[';
        $no = 1;
        foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }

            $arr = array(
                "no" => $no,
                "id" => $row->id,
                "name" => $row->code,
                "description" => $row->description,
            );

            $json .= json_encode($arr);
            $no++;
        }
        $json .= ']}';
        echo $json;
    }



}
