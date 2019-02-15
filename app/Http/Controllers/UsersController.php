<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TrUser;
use function GuzzleHttp\json_encode;
use Session;
use App\Services;

class UsersController extends Controller
{
    public function index()
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        return view('usersetting.users');
    }

    public function dataGrid() {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_user"
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));

    }

    public function store(Request $request)
    {
       try {
            $param["username"] = $request->username;
            $param["nama"] = $request->name;
            $param["email"] = $request->email;
            $param["job_code"] = $request->job_code;
            $param["nik"] = $request->nik;
            $param["area_code"] = $request->area_code;
            $param["fl_active"] = 1;

          
            if($request->edit_id) {
                $param["updated_at"] = date('Y-m-d H:i:s');
                $param["updated_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'PUT',
                    'method' => 'tr_user/' . $request->edit_id,
                    'data' => $param
                ));
            } else {
                $param["created_at"] = date('Y-m-d H:i:s');
                $param["created_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'POST',
                    'method' => 'tr_user',
                    'data' => $param
                ));
            }

            $res = $data->result;
            if ($res->code == '201') {
                return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);;
            } else {
                return response()->json(['status' => false, "message" => $res->message]);
            }

            
       } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
       }
    }

    public function show()
    {
        $param = $_REQUEST;
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_user/" . $param["id"]
        ));
        $data = $service->result;
        return response()->json(array('data' => $data->data));
    }

    public function inactive(Request $request) {
        try {
            $param["updated_by"] = Session::get('user');
            $data = new Services(array(
                'request' => 'ACTIVE',
                'method' => 'tr_user/' . $request->id . '/0',
                'data' => $param
            ));

            $res = $data->result;

            if ($res->code == '201') {
                return response()->json(['status' => true, "message" => 'Data is successfully inactived']);;
            } else {
                return response()->json(['status' => false, "message" => $res->message]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
    }
   
    public function active(Request $request) {
        try {
            $param["updated_by"] = Session::get('user');
            $data = new Services(array(
                'request' => 'ACTIVE',
                'method' => 'tr_user/' . $request->id . '/1',
                'data' => $param
            ));

            $res = $data->result;

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
