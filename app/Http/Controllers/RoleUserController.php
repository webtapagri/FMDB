<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RoleUser;
use function GuzzleHttp\json_encode;
use Session;
use App\Services;

class RoleUserController extends Controller
{

    public function index()
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        return view('usersetting.role_user');
    }

    public function dataGrid()
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_role_user"
        ));
        $data = $service->result;    
 
        return response()->json(array('data' => $data->data));
    }
 
    public function get_tr_user()
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_user"
        ));
        $data = $service->result;
        $item = array();
        foreach($data->data as $row) {
            if($row->fl_active == 1) {
                $item[] = array(
                    'id' => $row->username,
                    'text' => $row->nama
                );
            }
        }

        return response()->json(array('data' => $item));
    }

    public function get_role()
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tm_role"
        ));
        $data = $service->result;
        $item = array();
        foreach ($data->data as $row) {
            if ($row->role_active == 1) {
                $item[] = array(
                    'id' => $row->id,
                    'text' => $row->id . ' - '.$row->role_name
                );
            }
        }

        return response()->json(array('data' => $item));
    }

    public function store(Request $request)
    {

        try {
            $param["role_id"] = $request->role_id;
            $param["username"] = $request->username;
            $param["user_role_active"] = 1;

            if ($request->edit_id) {
                $param["updated_at"] = date('Y-m-d H:i:s');
                $param["updated_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'PUT',
                    'method' => 'tr_role_user/' . $request->edit_id,
                    'data' => $param
                ));
            } else {
                $param["created_at"] = date('Y-m-d H:i:s');
                $param["created_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'POST',
                    'method' => 'tr_role_user',
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
            'method' => "tr_role_user/" . $param["id"]
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
    }

    public function inactive(Request $request)
    {
        try {
            $param["updated_by"] = Session::get('user');
            $data = new Services(array(
                'request' => 'ACTIVE',
                'method' => 'tr_role_user/' . $request->id . '/0',
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

    public function active(Request $request)
    {
        try {
            $param["updated_by"] = Session::get('user');
            $data = new Services(array(
                'request' => 'ACTIVE',
                'method' => 'tr_role_user/' . $request->id . '/1',
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
