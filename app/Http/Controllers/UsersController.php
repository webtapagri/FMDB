<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\TrUser;
use function GuzzleHttp\json_encode;
use Session;
class UsersController extends Controller
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

        return view('usersetting.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dataGrid() {
        $data = DB::table('tr_user')->get();
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
                $data = TrUser::find($request->edit_id);
                $data->UPDATED_AT = date('Y-m-d');
                $data->UPDATED_BY = Session::get('user');
            } else {
                $data = new TrUser();
                $data->CREATED_AT = date('Y-m-d');
                $data->CREATED_BY = Session::get('user');
            }

            $data->USERNAME = $request->username;
            $data->NAMA = $request->name;
            $data->EMAIL = $request->email;
            $data->JOB_CODE = $request->job_code;
            $data->NIK = $request->nik;
            $data->AREA_CODE = $request->area_code;
            $data->FL_ACTIVE = 1;

            $data->save();

            return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);
       } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrUser  $TrUser
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $param = $_REQUEST;
        $data = DB::table('tr_user')->where('USER_ID', $param["id"] )->get();
        return response()->json(array('data' => $data));
    }

    public function inactive(Request $request) {
       $data = TrUser::find($request->id);
       $data->FL_ACTIVE = 0;
       $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully inactived']);
    }
   
    public function active(Request $request) {
       $data = TrUser::find($request->id);
       $data->FL_ACTIVE = 1;
       $data->save();
        return response()->json(['status' => true, "message" => 'Data is successfully actived']);
    }

    public function get_material_group()
    {
        $url = "http://tap-ldapdev.tap-agri.com/data-sap/material_group";
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        $result = $response->getBody()->getContents();
        $data = json_decode($result);
        $json = '{"data":[';
        for ($i=0; $i < count($data->data[0]); $i++) { 

            if($i>0) {
                $json .= ",";
            }
            $arr = array(
                "id"=> $data->data[0][$i]->MATKL,
                "text"=> $data->data[0][$i]->MATKL." - ". str_replace("_"," ", $data->data[0][$i]->WGBEZ60)
            );
            $json .= json_encode($arr); 
        }    

        $json .="]}";
        echo $json;
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrUser  $TrUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TrUser $TrUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrUser  $TrUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrUser $TrUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrUser  $TrUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrUser $TrUser)
    {
        //
    }
}
