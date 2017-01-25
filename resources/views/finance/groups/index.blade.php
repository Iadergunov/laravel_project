@extends('app')

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">Groups of transactions</div>
            @foreach($finance_groups as $finance_group)
                <div class="panel-body">
                    <p><a href="{{action('Finance_groups_controller@show', [$finance_group->id])}}">{{ $finance_group->name }}</a></p>
                </div>
            @endforeach
            <div class="col-md-12">
                <a href="{{ action('Finance_groups_controller@create') }}"><button class="btn btn-primary">Create new group</button></a>
            </div>
        </div>
    </div>
    @include('finance.partial._sidebar')
@stop