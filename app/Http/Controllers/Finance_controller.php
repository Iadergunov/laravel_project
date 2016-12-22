<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Finance_controller extends Controller
{
    public function index(){
        $transactions = Transaction::latest('date_time')->get();
        //$summ = 3;
        //$summ = $transactions->sum('amount');
        return view('finance.index', compact('transactions'));
    }

    public function create_transaction(){
        return view('finance.transactions.create');
    }

    public function store_transaction(CreateTransactionRequest $request){
        $input = $request->all();
        $transaction = new Transaction($input);
        Auth::user()->transactions()->save($transaction);
        //Transaction::create($input);
        return redirect('transactions');
    }

    public function today_transactions(){
        $transactions = Transaction::latest('date_time')->today()->get();
        return view('finance.index', compact('transactions'));
    }

    public function yesterday_transactions(){
        $transactions = Transaction::latest('date_time')->yesterday()->get();
        return view('finance.index', compact('transactions'));
    }
}
