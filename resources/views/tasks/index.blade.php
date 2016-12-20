@extends('app')

@section('title')
    Tasks
@stop

@section('content')
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task
            </div>
            <div class="panel-body">

                <!-- New Task Form -->
                <form class="form-horizontal">
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" id="task-name" class="form-control" placeholder="Enter new task">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button class="btn btn-default" id="Add">
                                <i class="fa fa-btn fa-plus"></i> Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>
        <div class="panel-body">
            <table class="table table task-table">
                <thead>
                <th>Task</th>
                </thead>
                <tbody id='current' class="col-sm-12">
                @foreach($tasks as $task)
                    <tr id="task_" + {{ $task->id }}>
                    <td class="table-text">
                        <div>
                            {{ $task->task }}
                        </div>
                    </td><td>
                        <button class="btn btn-danger">
                            <i class="fa fa-btn fa-trash"></i>Delete</button>
                    </td><td>
                        <button class="btn btn-danger">
                            <i class="fa fa-btn fa-pencil"></i>Edit</button>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

@stop