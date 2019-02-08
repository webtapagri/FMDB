<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientErrorResponseException;
use App\Services;
use function GuzzleHttp\json_encode;
use Session;

class TrMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        return view('tr_materials/index');
    }

    public function grid($search)
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_materials/" . $search
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
    }

    public function image($no_document)
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_files/' . $no_document
        ));
        $data = $service->result;
        if ($data->status === "failed") {
            return '';
        } else {
            return $data->data->file_image;
        }
    }

    public function auto_sugest()
    {
        $result = array();
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_materials'
        ));

        $res = $service->result;
        if ($res->status === 'success') {
            foreach ($res->data as $key => $value) {
                if (!in_array($value->no_material, $result)) {
                    $result = array_merge($result, array($value->no_material));
                }
            }

            foreach ($res->data as $key => $value) {
                if (!in_array($value->material_name, $result)) {
                    $result = array_merge($result, array($value->material_name));
                }
            }

            foreach ($res->data as $key => $value) {
                if (!in_array($value->part_number, $result)) {
                    $result = array_merge($result, array($value->part_number));
                }
            }
        }

        return response()->json(array('data' => $result));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

  
        $param = array(
            "part_number" => $request->part_no,
            "spec" => $request->specification,
            "merk" => $request->merk,
            "material_name" => $request->material_sap,
            "description" => $request->description,
            "uom" => $request->uom,
            "gross_weight" => $request->gross_weight,
            "net_weight" => $request->net_weight,
            "volume" => $request->volume,
            "size_dimension" => $request->size,
            "weight_unit" => $request->weight_unit,
            "volume_unit" => $request->volume_unit,
            "remarks" => $request->remarks,
            "updated_by" => 'user',
        );
        
        $service = new Services(array(
            'request' => 'PUT',
            'method' => 'tr_materials/' . $request->no_document,
            'data' => $param
        ));

        $res = $service->result;
        if ($res->code == '201') {
            /* foreach ($_FILES as $row) {
                if ($row["name"]) {
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
            } */
        }

        echo json_encode(array(
            'code' => 201,
            "message" => "berhasil"
        ));
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        $material = $this->material($id);
        $param = (object) array(
            "no_document" => $material[0]->no_document,
            "industri_sector" => $material[0]->industri_sector,
            "plant" => $material[0]->plant,
            "store_loc" => $material[0]->store_loc,
            "sales_org" => $material[0]->sales_org,
            "dist_channel" => $material[0]->dist_channel,
            "mat_group" => $material[0]->mat_group,
            "part_number" => $material[0]->part_number,
            "spec" => $material[0]->spec,
            "merk" => $material[0]->merk,
            "material_name" => $material[0]->material_name,
            "description" => $material[0]->description,
            "uom" => $material[0]->uom,
            "division" => $material[0]->division,
            "item_cat_group" => $material[0]->item_cat_group,
            "gross_weight" => $material[0]->gross_weight,
            "net_weight" => $material[0]->net_weight,
            "volume" => $material[0]->volume,
            "size_dimension" => $material[0]->size_dimension,
            "weight_unit" => $material[0]->weight_unit,
            "volume_unit" => $material[0]->volume_unit,
            "mrp_controller" => $material[0]->mrp_controller,
            "valuation_class" => $material[0]->valuation_class,
            "tax_classification" => $material[0]->tax_classification,
            "account_assign" => $material[0]->account_assign,
            "general_item" => $material[0]->general_item,
            "avail_check" => $material[0]->avail_check,
            "transportation_group" => $material[0]->transportation_group,
            "loading_group" => $material[0]->loading_group,
            "profit_center" => $material[0]->profit_center,
            "mrp_type" => $material[0]->mrp_type,
            "period_sle" => $material[0]->period_sle,
            "cash_discount" => $material[0]->cash_discount,
            "price_unit" => $material[0]->price_unit,
            "locat" => $material[0]->locat,
            "material_type" => $material[0]->material_type,
            "remarks" => $material[0]->remarks
        );

        $div = DB::table('tm_general_data')->where(array("general_code"=> "div", "description_code"=> $param->division))->pluck('description');
        $plant = DB::table('tm_general_data')->where(array("general_code" => "plant", "description_code" => $param->plant))->pluck('description');
        $location = DB::table('tm_general_data')->where(array("general_code" => "location", "description_code" => $param->locat))->pluck('description');
        $mrp_controller = DB::table('tm_general_data')->where(array("general_code" => "mrp_controller", "description_code" => $param->mrp_controller))->pluck('description');
        $valuation_class = DB::table('tm_general_data')->where(array("general_code" => "valuation_class", "description_code" => $param->valuation_class))->pluck('description');
        $industry_sector = DB::table('tm_general_data')->where(array("general_code" => "industry_sector", "description_code" => $param->industri_sector))->pluck('description');
        $material_type = DB::table('tm_general_data')->where(array("general_code" => "material_type", "description_code" => $param->material_type))->pluck('description');
        $sales_org = DB::table('tm_general_data')->where(array("general_code" => "sales_org", "description_code" => $param->sales_org))->pluck('description');
        $item_cat = DB::table('tm_general_data')->where(array("general_code" => "item_cat", "description_code" => $param->item_cat_group))->pluck('description');
        $dist_channel = DB::table('tm_general_data')->where(array("general_code" => "dist_channel", "description_code" => $param->dist_channel))->pluck('description');
        $tax_class = DB::table('tm_general_data')->where(array("general_code" => "tax_class", "description_code" => $param->tax_classification))->pluck('description');
        $account_assign = DB::table('tm_general_data')->where(array("general_code" => "account_assign", "description_code" => $param->account_assign))->pluck('description');
        $avail_check = DB::table('tm_general_data')->where(array("general_code" => "avail_check", "description_code" => $param->avail_check))->pluck('description');
        $trans_group = DB::table('tm_general_data')->where(array("general_code" => "trans_group", "description_code" => $param->transportation_group))->pluck('description');
        $loading_group = DB::table('tm_general_data')->where(array("general_code" => "loading_group", "description_code" => $param->loading_group))->pluck('description');
        $profit_center = DB::table('tm_general_data')->where(array("general_code" => "profit_center", "description_code" => $param->profit_center))->pluck('description');
        $mrp_type = DB::table('tm_general_data')->where(array("general_code" => "mrp_type", "description_code" => $param->mrp_type))->pluck('description');
        $sle = DB::table('tm_general_data')->where(array("general_code" => "sle", "description_code" => $param->period_sle))->pluck('description');

        $data['div'] = $div[0];
        $data['plant'] = $plant[0];
        $data['location'] = $location[0];
        $data['mrp_controller'] = $mrp_controller[0];
        $data['valuation_class'] = $valuation_class[0];
        $data['industry_sector'] = $industry_sector[0];
        $data['material_type'] = $material_type[0];
        $data['dist_channel'] = $dist_channel[0];
        $data['item_cat'] = $item_cat[0];
        $data['tax_class'] = $tax_class[0];
        $data['account_assign'] = $account_assign[0];
        $data['avail_check'] = $avail_check[0];
        $data['trans_group'] = $trans_group[0];
        $data['loading_group'] = $loading_group[0];
        $data['profit_center'] = $profit_center[0];
        $data['mrp_type'] = $mrp_type[0];
        $data['sle'] = $sle[0];
        $data['sales_org'] = $sales_org[0];
        $data['store_loc'] = $param->store_loc;
        $data['price_unit'] = $param->price_unit;
        $data['plant_id'] = $param->plant;
        $data['cash_discount'] = ($param->cash_discount == 0 ? 'No':'yes');
        $data['material'] = $param;

        return view('tr_materials/edit', $data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    function material($id) {
        $result = array();
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_materials/' . $id
        ));

        $res = $service->result;
        if ($res->status === 'success') {
            $result = $res->data;
        }

        return $result;
    } 

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
