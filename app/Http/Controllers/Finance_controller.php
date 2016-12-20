<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class Finance_controller extends Controller
{
    public function index(){
        $transactions = Transaction::all();
        return view('finance.index', compact('transactions'));
    }
}
