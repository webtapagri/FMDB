<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialUserController extends Controller
{
    public function index() {
        return view('material');
    }
}
