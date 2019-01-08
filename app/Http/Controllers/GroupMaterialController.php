<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GroupMaterial;
use function GuzzleHttp\json_encode;

class GroupMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('groupmaterials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData() {
        //return Datatables::of(GroupMaterial::query())->make(true);
        $data = DB::table('group_materials')->select('id', 'name', 'description', 'status')->get();
        $json = '{"data":[';
        $no = 1;
        foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }

            if ($row->status == 1) {
                $status = '<span class="label label-danger status" data-status="' . $row->status . '">inactive</span>';
            } else {
                $status = '<span class="label label-primary status" data-status="' . $row->status . '">active</span>';
            }
 
            $arr = array(
                "id" => $row->id,
                "no" => $no,
                "name" => $row->name,
                "description" => $row->description,
                "status" => $status,
                "action" => '
                    <button class="btn btn-xs btn-success btn-action btn-edit" title="edit data '.$row->name. '" onClick="edit(' . $row->id . ')"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-xs btn-danger btn-action btn-activated ' . ($row->status == 0 ? '' : 'hide') . '" onClick="inactive('.$row->id.')"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-xs btn-success btn-action btn-inactivated '.($row->status == 1 ? '': 'hide'). '" onClick="active(' . $row->id . ')"><i class="fa fa-check"></i></button>
                '
            );

            $json .= json_encode($arr);
            $no++;
        }
        $json .= ']}';
        echo $json;
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
        
        if($request->edit_id) {
            $group_material = GroupMaterial::find($request->edit_id);
        }else{
            $group_material = new GroupMaterial();
        }

        $group_material->name = $request->name;
        $group_material->description = $request->description;
        $group_material->status = 0;
       
       
        $group_material->save();

        return response()->json(['status' => true, "message"=> 'Data is successfully '. ($request->edit_id ? 'updated':'added')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupMaterial  $groupMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMaterial $groupMaterial)
    {
        $param = $_REQUEST;
        $json = '{"data":[';
        $data = DB::table('group_materials')->select('id', 'name', 'description', 'status')->where('id', $param["id"] )->get();
        foreach($data as $row) {
            $json .= json_encode($row);
        }    
        $json .= ']}';    
        echo $json;
    }

    public function inactive(Request $request) {
        $group_material = GroupMaterial::find($request->id);
        $group_material->status = 1;
        $group_material->save();
        return response()->json(['status' => true, "message" => 'Data is successfully inactived']);
    }
   
    public function active(Request $request) {
        $group_material = GroupMaterial::find($request->id);
        $group_material->status = 0;
        $group_material->save();
        return response()->json(['status' => true, "message" => 'Data is successfully actived']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GroupMaterial  $groupMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupMaterial $groupMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GroupMaterial  $groupMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupMaterial $groupMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GroupMaterial  $groupMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMaterial $groupMaterial)
    {
        //
    }
}
