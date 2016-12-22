<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\CreateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Account_controller extends Controller
{
    public function index(){
        $accounts = Auth::user()->accounts()->get();
        return view('finance.accounts.index', compact('accounts'));
    }

    public function create(){
        return view('finance.accounts.create');
    }

    public function store(CreateAccountRequest $request){
        $input = $request->all();
        $account = new Account($input);
        Auth::user()->accounts()->save($account);
        return redirect('finance/accounts');
    }
}
