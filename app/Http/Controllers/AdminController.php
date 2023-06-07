<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('permission:create_product');
    }
    public function home()
    {
        return view('admin.index');
    }
}
