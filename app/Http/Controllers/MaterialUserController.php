<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;

use App\SetMaterial;
use App\Guz;

class MaterialUserController extends Controller
{
    public function index() {
        return view('material');
    }

    public function get_tm_material() {
        $url = "http://149.129.224.117:8080/api/tm_materials";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        $result = $response->getBody()->getContents();
        $data = json_decode($result);

        $no = 1;
        $json = '{"data":[';
        foreach($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }
            $arr = array(
                "img" => ' <img src="'. asset('img/genset.jpeg ') .'" class="img-responsive text-center" ></td>',
                "detail" => '
                    <table class="table">
                        <tr style="height:20px !important">
                            <td><b>Material Number</b></td>
                            <td>'.$row->no_material .'</td>
                            <td rowspan="3" style="width:10%">
                                <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block">Extend</span>
                                <span href="#" class="btn btn-flat btn-sm btn-default btn-flat btn-block ">Reado to PO</span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Nama Material</b></td>
                            <td>'.$row->material_name .'</td>
                        </tr>
                            <tr>
                            <td><b>Merk</b></td>
                            <td>'.$row->merk .'</td>
                        </tr>
                        <tr>
                            <td><b>Satuan</b></td>
                            <td>'.$row->weight_unit .'</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Keterangan</b></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Generator - Max Power: 5.500 watt - Rated Power: 5.000 watt - Rated Ampere: 22.7 A - Voltage: 220 Volt   Frekuensi: 50 Hz- DC Output: 12 Volt / 8.3 A - Phasa: Single </br> Engine - Type: 4 stroke, OHV, Air Cooled - Engine Model: GX 390 - Displacement: 389 CC - Max. Power Output: 13 HP / 3.600 RPM - Starting System: Electric + Recoil Starting / Engkol Tarik- Fuel: Gasoline- Fuel Tank Capacity: 28 Litre - Oil Engine Capacity: 1.100 ml - Noise Level: 72 dB - Dimension: 77 x 56 x 57 cm - Gross Weight: 97 kg
                            </td>
                        </tr>
                    </table>
                ',
            );

            $json .= json_encode($arr);
            $no++;
        }
        $json .= ']}';
        echo $json;
    }

    public function get_auto_sugest()
    {
        $url = "http://149.129.224.117:8080/api/tm_materials";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

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

        $data = array(
            "no_document" => rand(1, 1000000),
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


        $url = "http://149.129.224.117:8080/api/tr_materials";
        $client = new Client();
        $res = $client->request('POST', $url, array('form_params' => $data));
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



}
