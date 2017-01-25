@extends('app')

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">Groups of transactions</div>
            @foreach($groups as $group)
                <div class="panel-body">
                    <p>{{ $group->name }}</p>
                </div>
            @endforeach
            <div class="col-md-12">
                <a href="{{ action('Finance_groups_controller@create') }}"><button class="btn btn-primary">Create new group</button></a>
            </div>
        </div>
    </div>
    @include('finance.partial._sidebar')
@stop