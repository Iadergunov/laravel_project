<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tasks_controller extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(TaskRequest $request){
        $input = $request->all();
        $task = new Task($input);
        Auth::user()->tasks()->save($task);
        return redirect(action('Tasks_controller@index'));
    }

    public function change_status_task(TaskRequest $request){
        $task = $request->all();

    }
}
