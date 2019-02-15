<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TmRole;
use function GuzzleHttp\json_encode;
use Session;
use App\Services;

class MenuController extends Controller
{

    public function index()
    {
        if (empty(Session::get('authenticated')))
            return redirect('/login');

        return view('usersetting.menu');
    }

    public function dataGrid()
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tm_menu"
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
    }

    public function store(Request $request)
    {
        try {
            $param["menu_code"] = $request->code;
            $param["menu_name"] = $request->name;
            $param["url"] = $request->url;
            $param["sorting"] = $request->sorting;

            if ($request->edit_id) {
                $param["updated_at"] = date('Y-m-d H:i:s');
                $param["updated_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'PUT',
                    'method' => 'tm_menu/' . $request->edit_id,
                    'data' => $param
                ));
            } else {
                $param["created_at"] = date('Y-m-d H:i:s');
                $param["created_by"] = Session::get('user');
                $data = new Services(array(
                    'request' => 'POST',
                    'method' => 'tm_menu',
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
            'method' => "tm_menu/" . $param["id"]
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
        
    }

    public function inactive(Request $request)
    {
        try {
            $data = new Services(array(
                'request' => 'DELETE',
                'method' => 'tm_menu/' . $request->id,
            ));

            $res = $data->result;

            if ($res->code == '201') {
                return response()->json(['status' => true, "message" => 'Data is successfully deleted']);;
            } else {
                return response()->json(['status' => false, "message" => $res->message]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
    }
}
