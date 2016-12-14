<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact_controller extends Controller
{
    public function index(){
        return view('Contacts');
    }
}

