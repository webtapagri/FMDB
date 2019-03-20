<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Session;
use API;
use AccessRight;

class VerifikasiController extends Controller
{
    public function index()
    {
        if(empty(Session::get('authenticated')))
            return redirect('/login');

        if (AccessRight::granted() == false)
            return response(view('errors.403'), 403);;

        $access = AccessRight::access();    
        return view('verifikasi')->with(compact($access));
    }

    public function dataGrid()
    {
        $role_id = Session::get('role_id');
        $service = API::exec(array(
            'request' => 'GET',
            'method' => "outstanding/" . $role_id 
        ));
        $data = $service;

        return response()->json(array('data' => $data->data));

    }
}