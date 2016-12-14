<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Finance_controller extends Controller
{
    public function index(){
        return view('finance.index');
    }
}
