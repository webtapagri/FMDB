<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use App\SetMaterial;

class MaterialUserController extends Controller
{
    public function index() {
        return view('material');
    }

    public function store(Request $request)
    {
        try {
            $material = new SetMaterial();
            $material->no_document = rand();
            $material->industri_sector = $request->industri_sector;
            $material->plant = $request->plant;
            $material->store_loc = $request->store_location;
            $material->sales_org = $request->sales_org;
            $material->dist_channel = $request->dist_channel;
            $material->mat_group = $request->group_material;
            $material->part_number = $request->part_no;
            $material->spec = $request->specification;
            $material->merk = $request->brand;
            $material->material_name = $request->material_sap;
            $material->description = $request->description;
            $material->uom = $request->uom;
            $material->division = $request->division;
            $material->item_cat_group = $request->item_category_group;
            $material->gross_weight = $request->gross_weight;
            $material->net_weight = $request->net_weight;
            $material->volume = $request->volume;
            $material->size_dimension = $request->size;
            $material->weight_unit = $request->weight_unit;
            $material->volume_unit = $request->volume_unit;
            $material->no_material = $request->material_no;
            $material->mrp_controller = $request->mrp_controller;
            $material->valuation_class = $request->valuation_class;
            $material->tax_classification = $request->tax_classification;
            $material->tax_classification = 1;
            $material->account_assign = $request->account_assign;
            $material->general_item = $request->general_item_category_group;
            $material->avail_check = $request->availability_check;
            $material->transportation_group = $request->transportation_group;
            $material->loading_group = $request->loading_group;
            $material->profit_center = $request->profit_center;
            $material->mrp_type = $request->mrp_type;
            //$material->period_sle = $request->period_ind_for_sle;
            $material->period_sle = "909";
            $material->cash_discount = $request->cash_discount;
            $material->price_unit = $request->price_unit;
            $material->locat = $request->location;
            $material->save();

            return response()->json(['status' => true, "message" => 'Data is successfully added']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
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



}
