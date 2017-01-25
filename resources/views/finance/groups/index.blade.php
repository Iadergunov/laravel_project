@extends('app')

@section('content')
    @include('finance.partial._header')
    <div class="col-sm-9">
        <h2>Groups of transactions</h2>
        @foreach($groups as $group)
            <div class="body">
                <p>{{ $group->name }}</p>
            </div>
        @endforeach
        <div class="col-md-12">
            <a href="{{ action('Groups_of_transactions_controller@create') }}"><button class="btn btn-primary">Create new group</button></a>
        </div>
    </div>
    @include('finance.partial._sidebar')
@stop