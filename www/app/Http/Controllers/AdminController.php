<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //后台
    public function index(){
        return view('layouts.admin');
    }
}
