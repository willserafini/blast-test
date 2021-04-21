@extends('layout')

@section('title', 'Customer List')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            <a href="/customers/create">Add new Customer</a>
        </div>
    </div>

    <div class="row">
        @foreach ($customers as $customer)
        <div class="col-2">
            {{$customer->id}}
        </div>
        <div class="col-4">
            <a href="/customers/{{ $customer->id }}">{{$customer->name}}</a>            
        </div>
        <div class="col-4">
            {{$customer->company->name}}
        </div>
        <div class="col-2">
            {{$customer->active}}
        </div>
        @endforeach
    </div>
    
@endsection
