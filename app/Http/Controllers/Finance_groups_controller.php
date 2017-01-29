<?php

namespace App\Http\Controllers;

use App\Finance_group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Finance_groups_controller extends Controller
{
    public function index(){
        $finance_groups = Auth::user()->finance_groups()->get();
        return (view('finance.groups.index', compact('finance_groups')));
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
        $finance_group = new Finance_group($input);
        Auth::user()->finance_groups()->save($finance_group);
        return redirect(action('Finance_groups_controller@index'));
    }


    /**
     * Show on particular group defined by id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function show($id){
        $finance_group = Finance_group::findOrFail($id);
        $transactions = $finance_group->transactions()->get();
        //return view('finance.groups.show', compact('finance_group','transactions'));
        return view('finance.transactions.index', compact('transactions'));
      }
}
