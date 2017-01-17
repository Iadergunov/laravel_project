<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class Finance_controller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('finance.index');
    }

    public function reports(){
        return view('finance.reports.index');
    }
}
