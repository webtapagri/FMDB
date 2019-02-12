<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RoleUser;
use function GuzzleHttp\json_encode;
use Session;

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
        $data = DB::table('tr_role_user')
            ->join('tm_role', 'tm_role.id', '=', 'tr_role_user.ROLE_ID')
            ->join('tr_user', 'tr_user.USERNAME', '=', 'tr_role_user.USERNAME')
            ->select(
                "tr_role_user.ID_USER_ROLE as id",
                "tr_user.USERNAME as username",
                "tr_user.NAMA as name",
                "tm_role.id as role_id",
                "tm_role.role_name as role_name",
                "tr_role_user.USER_ROLE_ACTIVE as status"
            )->get();
 

        return response()->json(array('data' => $data));
    }

    public function get_tr_user()
    {
        $data = DB::table('tr_user')->where("FL_ACTIVE", 1)->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id" => $row->USERNAME,
                "text" => $row->USERNAME . " - " . $row->NAMA
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function get_role()
    {
        $data = DB::table('tm_role')->where("role_active", 1)->get();
        $arr = array();
        foreach ($data as $row) {
            $arr[] = array(
                "id" => $row->id,
                "text" => $row->id . " - " . $row->role_name
            );
        }
        return response()->json(array('data' => $arr));
    }

    public function store(Request $request)
    {

        try {
            if ($request->edit_id) {
                $data = RoleUser::find($request->edit_id);
                $data->UPDATED_AT = date('Y-m-d');
                $data->UPDATED_BY = Session::get('user');
            } else {
                $data = new RoleUser();
                $data->CREATED_AT = date('Y-m-d');
                $data->CREATED_BY = Session::get('user');
            }

            $data->ROLE_ID = $request->role_id;
            $data->USERNAME = $request->username;
            $data->USER_ROLE_ACTIVE = 1;

            $data->save();

            return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
    }

    public function show()
    {
        $param = $_REQUEST;
        $data = DB::table('tr_role_user')->where('ID_USER_ROLE', $param["id"])->get();
        return response()->json(array('data' => $data));
    }

    public function inactive(Request $request)
    {
        $data = RoleUser::find($request->id);
        $data->USER_ROLE_ACTIVE = 0;
        $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully inactived']);
    }

    public function active(Request $request)
    {
        $data = RoleUser::find($request->id);
        $data->USER_ROLE_ACTIVE = 1;
        $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully actived']);
    }


}
