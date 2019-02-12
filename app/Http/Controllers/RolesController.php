<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TmRole;
use function GuzzleHttp\json_encode;
use Session;

class RolesController extends Controller
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

        return view('usersetting.roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataGrid()
    {
        $data = DB::table('tm_role')->get();
        return response()->json(array('data' => $data));
    }

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

    public function inactive(Request $request)
    {
        $data = TmRole::find($request->id);
        $data->role_active = 0;
        $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully inactived']);
    }

    public function active(Request $request)
    {
        $data = TmRole::find($request->id);
        $data->role_active = 1;
        $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully actived']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tm_Role  $Tm_Role
     * @return \Illuminate\Http\Response
     */
    public function edit(Tm_Role $Tm_Role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tm_Role  $Tm_Role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tm_Role $Tm_Role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tm_Role  $Tm_Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tm_Role $Tm_Role)
    {
        //
    }
}
