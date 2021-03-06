<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SingleOutStandingExport;
use Maatwebsite\Excel\Facades\Excel;
use Cookie;
use Session;
use API;

class OutstandingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(empty(Session::get('authenticated')))
            return redirect('/login');
 

        return view('outstanding');
    }

    public function downloadExcel(Request $request) {
        return Excel::download(new SingleOutStandingExport($request->document_no), 'material_request.xlsx');
    }
   
    public function sync(Request $request) {
        $service = API::exec(array(
            'request' => 'GET',
            'method' => "tr_materials/" . $_REQUEST["no_document"]
        ));
        $data = $service;
        $arr = array();
        foreach ($data->data as $fmdb) {
            $param["material_number"] = $fmdb->no_material;
            $param["industri_sector"] = $fmdb->industri_sector;
            $param["material_type"] = $fmdb->material_type;
            $param["plant"] = $fmdb->plant;
            $param["store_loc"] = $fmdb->store_loc;
            $param["sales_org"] = $fmdb->sales_org;
            $param["dist_channel"] = $fmdb->dist_channel;
            $param["material_name"] = $fmdb->material_name;
            $param["uom"] = $fmdb->uom;
            $param["mat_group"] = $fmdb->mat_group;
            $param["division"] = $fmdb->division;
            $param["item_cat_group"] = $fmdb->item_cat_group;
            $param["gross_weight"] = $fmdb->gross_weight;
            $param["net_weight"] = $fmdb->net_weight;
            $param["volume"] = $fmdb->volume;
            $param["size_dimension"] = $fmdb->size_dimension;
            $param["weight_unit"] = $fmdb->weight_unit;
            $param["volume_unit"] = $fmdb->volume_unit;
            $param["cash_discount"] = $fmdb->cash_discount;
            $param["tax_classification"] = $fmdb->tax_classification;
            $param["account_assign"] = $fmdb->account_assign;
            $param["general_item"] = $fmdb->general_item;
            $param["avail_check"] = $fmdb->avail_check;
            $param["transportation_group"] = $fmdb->transportation_group;
            $param["loading_group"] = $fmdb->loading_group;
            $param["profit_center"] = $fmdb->profit_center;
            $param["mrp_type"] = $fmdb->mrp_type;
            $param["mrp_controller"] = $fmdb->mrp_controller;
            $param["period_sle"] = $fmdb->period_sle;
            $param["valuation_class"] = $fmdb->valuation_class;
            $param["price_unit"] = $fmdb->price_unit;
            $param["price_estimate"] = $fmdb->price_estimate;
        }

        $service = API::exec(array(
            'request' => 'GET',
            'host'=> 'ldap',
            'method' => "sync_material",
            "data" => $param 
        ));
        $data = $service->data;
        if( $data[0]->TYPE == "E") {
             return response()->json(array('status'=>false, "message"=> $data[0]->MESSAGE));
        } else {
             return response()->json(array('status'=>true, "message"=> $data[0]->MESSAGE));
        }
    }

    
}