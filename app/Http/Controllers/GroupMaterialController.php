<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\GroupMaterial;

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
        return Datatables::of(GroupMaterial::query())->make(true);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GroupMaterial  $groupMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMaterial $groupMaterial)
    {
        //
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
