<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientErrorResponseException;
use App\Services;
use function GuzzleHttp\json_encode;

class TrMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tr_materials/index');
    }

    public function grid($search)
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => "tr_materials/" . $search
        ));
        $data = $service->result;

        return response()->json(array('data' => $data->data));
    }

    public function get_image($no_document)
    {
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_files/' . $no_document
        ));
        $data = $service->result;
        if ($data->status === "failed") {
            return '';
        } else {
            return $data->data->file_image;
        }
    }

    public function auto_sugest()
    {
        $result = array();
        $service = new Services(array(
            'request' => 'GET',
            'method' => 'tr_materials'
        ));

        $res = $service->result;
        if ($res->status === 'success') {
            foreach ($res->data as $key => $value) {
                if (!in_array($value->no_material, $result)) {
                    $result = array_merge($result, array($value->no_material));
                }
            }

            foreach ($res->data as $key => $value) {
                if (!in_array($value->material_name, $result)) {
                    $result = array_merge($result, array($value->material_name));
                }
            }

            foreach ($res->data as $key => $value) {
                if (!in_array($value->part_number, $result)) {
                    $result = array_merge($result, array($value->part_number));
                }
            }
        }

        return response()->json(array('data' => $result));
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
        return view('tr_materials/edit');
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
