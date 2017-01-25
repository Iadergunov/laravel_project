<?php

namespace App\Http\Controllers;

use App\Group_of_transactions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Groups_of_transactions_controller extends Controller
{
    public function index(){
        $groups = Auth::user()->Group_of_transactions()->get();
        return (view('finance.groups.index', compact('groups')));
    }

    public function create(){
        return view('finance.groups.create');
    }
}
