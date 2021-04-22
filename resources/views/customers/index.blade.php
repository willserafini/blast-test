@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Customers</h1>
            <a href="{{ route('customers.create') }}"><button type="button" class="btn btn-success px-3">New</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <strong>ID</strong>
        </div>
        <div class="col-3">
            <strong>Name</strong>
        </div>
        <div class="col-3">
            <strong>Document</strong>
        </div>
        <div class="col-2">
            <strong>Status</strong>
        </div>
        <div class="col-2">
            <strong>Actions</strong>
        </div>
    </div>

    <div class="row">
        @foreach ($customers as $customer)
            <div class="col-2">
                {{$customer->id}}
            </div>
            <div class="col-3">
                {{$customer->name}}    
            </div>
            <div class="col-3">
                {{$customer->document}}
            </div>
            <div class="col-2">
                {{$customer->status}}
            </div>
            <div class="col-2">
                <a href="/customers/{{ $customer->id }}">View</a>
            </div>
        @endforeach
    </div>
    
@endsection
