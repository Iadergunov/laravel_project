<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class Tasks_controller extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
}
