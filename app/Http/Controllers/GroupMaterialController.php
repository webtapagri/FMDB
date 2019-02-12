<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\GroupMaterial;
use function GuzzleHttp\json_encode;
use Session;
class GroupMaterialController extends Controller
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

        return view('groupmaterials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData() {
        //return Datatables::of(GroupMaterial::query())->make(true);
        $data = DB::table('group_materials')->select('id','code', 'latest_code', 'name', 'description', 'status')->get();
        $json = '{"data":[';
        $no = 1;
        foreach ($data as $row) {
            if ($no > 1) {
                $json .= ",";
            }

            if ($row->status == 1) {
                $status = '<span class="badge bg-grey status" data-status="' . $row->status . '">N</span>';
            } else {
                $status = '<span class="badge bg-green status" data-status="' . $row->status . '">Y</span>';
            }
 
            $arr = array(
                "id" => $row->id,
                "no" => $no,
                "code" => $row->code,
                "description" => $row->description,
                "name" => $row->name,
                "latest_code" => $row->latest_code,
                "status" => $status,
                "action" => '
                    <button class="btn btn-flat btn-xs btn-success btn-action btn-edit" title="edit data '.$row->name. '" onClick="edit(' . $row->id . ')"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-flat btn-xs btn-danger btn-action btn-activated ' . ($row->status == 0 ? '' : 'hide') . '" onClick="inactive('.$row->id. ')"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-flat btn-xs btn-success btn-action btn-inactivated '.($row->status == 1 ? '': 'hide'). '" onClick="active(' . $row->id . ')"><i class="fa fa-check"></i></button>
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
        
       try {
            if ($request->edit_id) {
                $group_material = GroupMaterial::find($request->edit_id);
            } else {
                $group_material = new GroupMaterial();
            }

            $group_material->code = $request->code;
            $group_material->latest_code = $request->latest_code;
            $group_material->name = $request->name;
            $group_material->description = $request->description;
            $group_material->status = 0;

            $group_material->save();

            return response()->json(['status' => true, "message" => 'Data is successfully ' . ($request->edit_id ? 'updated' : 'added')]);
       } catch (\Exception $e) {
            return response()->json(['status' => false, "message" => $e->getMessage()]);
       }
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
        $data = DB::table('group_materials')->where('id', $param["id"] )->get();
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
