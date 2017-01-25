<?php

namespace App\Http\Controllers;

use App\Finance_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Finance_groups_controller extends Controller
{
    public function index(){
        $groups = Auth::user()->finance_groups()->get();
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
        $group = new Finance_group($input);
        Auth::user()->finance_groups()->save($group);
        return redirect(action('Finance_groups_controller@index'));
    }
}
