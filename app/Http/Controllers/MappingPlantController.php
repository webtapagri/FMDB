<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TrUser;
use function GuzzleHttp\json_encode;
use Session;
use API;
use AccessRight;
class MappingPlantController extends Controller
{
    public function index()
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        if (AccessRight::granted() == false)
            return response(view('errors.403'), 403);

        $access = AccessRight::access();

        return view('mapping.plant')->with(compact('access'));
    }

    public function dataGrid() {
        $service = API::exec(array(
            'request' => 'GET',
            'method' => "tm_mapping_plant"
        ));
        $data = $service;

        return response()->json(array('data' => $data->data));

    }

    public function store(Request $request)
    {
       try {
            $param["plant"] = $request->plant;
            $param["sales_org"] = $request->sales_org;
            $param["locat"] = $request->locat;
            $param["store_loc"] = $request->store_loc;
            $param["profit_center"] = $request->profit_center;
            if($request->edit_id) {
                $data = API::exec(array(
                    'request' => 'PUT',
                    'method' => 'tm_mapping_plant/' . $request->edit_id,
                    'data' => $param
                ));

                $res = $data;
                if ($res->code == '201') {
                    return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);;
                } else {
                    return response()->json(['status' => false, "message" => $res->message]);
                }
            } else {
                if( $this->validatePlant($request->plant)) {
                    $data = API::exec(array(
                        'request' => 'POST',
                        'method' => 'tm_mapping_plant',
                        'data' => $param
                    ));

                    $res = $data;
                    if ($res->status == 'success') {

                        return response()->json(['status' => true, "message" => 'Data is successfully added']);;
                    } else {
                        return response()->json(['status' => false, "message" => $res->message]);
                    }
                } else{ 
                    return response()->json(['status' => false, "message" => 'Plant already already exist!']);
                }
            }
            
       } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
       }
    }

    public function validatePlant($plant) {
        $service = API::exec(array(
            'request' => 'GET',
            'method' => "tm_mapping_plant/" . $plant
        ));
        $profile = $service->data;    
        if($profile) {
            return false;
        } else {
            return true;
        }

    }

    public function show()
    {
        $param = $_REQUEST;
        $service = API::exec(array(
            'request' => 'GET',
            'method' => "tm_mapping_plant/" . $param["id"]
        ));
        $data = $service;
        return response()->json(array('data' => $data->data));
    }

    public function inactive(Request $request) {
        try {
            $param["updated_by"] = Session::get('user');
            $data = API::exec(array( 
                'request' => 'DELETE',
                'method' => 'tm_mapping_plant/' . $request->id ,
                'data' => $param
            ));

            $res = $data;

            if ($res->code == '201') {
                return response()->json(['status' => true, "message" => 'Data is successfully inactived']);;
            } else {
                return response()->json(['status' => false, "message" => $res->message]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
    }

}
