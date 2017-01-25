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

    /**
     * get the view to create new group of transactions
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('finance.groups.create');
    }

    /**
     * Save new group
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){
        $input = $request->all();
        $group = new Group_of_transactions($input);
        Auth::user()->Group_of_transactions()->save($group);
        return redirect(action('Groups_of_transactions_controller@index'));
    }
}
