<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages_controller extends Controller
{
    public function about(){
        //return view('pages/about')->with('name', $name);
        /*$data = [
            'first' => 'Igor',
            'last' => 'Dergunov!'
        ];*/
        $people = [
            'Taylor', 'Smith', 'Scot', 'Eric'
        ];

        //return view('pages/about', $data);
        return view('pages.about', compact('people'));
    }

    public function contact(){
        return view('Contacts');
    }
}
