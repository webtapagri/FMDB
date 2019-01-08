<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\GroupMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function groupMaterialGroup()
    {
        $data = DB::table('group_materials')->select('id', 'name', 'description', 'status')->where('status',0)->get();
        $json = '{"data":[';
        $no = 1;
        foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }


            $arr = array(
                "no" => $no,
                "id" => $row->id,
                "name" => $row->name,
                "description" => $row->description,
                "action" => '
                    <button class="btn btn-xs btn-success btn-action" select="select data ' . $row->name . '" onClick="SelectGroup(\'' . $row->name . '\',\'' . $row->description . '\')">select</button>
                '
            );

            $json .= json_encode($arr);
            $no++;
        }
        $json .= ']}';
        echo $json;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
