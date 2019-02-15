<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TmRole;
use function GuzzleHttp\json_encode;
use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Session;

class AccessRightController extends Controller
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

        return view('usersetting.accessright');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            if ($request->edit_id) {
                $data = TmRole::find($request->edit_id);
                $data->updated_at = date('Y-m-d');
                $data->updated_by = Session::get('user');
            } else {
                $data = new TmRole();
                $data->created_at = date('Y-m-d');
                $data->created_by = Session::get('user');
            }

            $data->role_name = $request->name;
            $data->id = $request->role_id;
            $data->role_active = 1;

            $data->save();

            return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tm_Role  $Tm_Role
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $param = $_REQUEST;
        $data = DB::table('tm_role')->where('id', $param["id"])->get();
        return response()->json(array('data' => $data));
    }
}
