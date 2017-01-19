<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Transactions_controller extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * get list of transactions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $transactions = Auth::user()->transactions()->latest('date_time')->get();
        return view('finance.transactions.index', compact('transactions'));
    }

    /**
     * view for creating new transactions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        $accounts = Auth::user()->accounts->pluck('name', 'id');
        return view('finance.transactions.create', compact('accounts'));
    }

    /**
     * Save a new transaction
     * @param CreateTransactionRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTransactionRequest $request){
        $input = $request->all();
        $transaction = new Transaction($input);
        Auth::user()->transactions()->save($transaction);
        return redirect(action('Transactions_controller@index'));
    }

    public function today_transactions(){
        $transactions = Auth::user()->transactions()->latest('date_time')->today()->get();
        return view('finance.transactions.index', compact('transactions'));
    }

    public function yesterday_transactions(){
        $transactions = Auth::user()->transactions()->latest('date_time')->yesterday()->get();
        return view('finance.transactions.index', compact('transactions'));
    }
}
