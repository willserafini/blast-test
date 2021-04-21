@extends('layout')

@section('title', 'Customer Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer Edit {{$customer->name}}</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="/customers/{{ $customer->id }}" method="POST" class="pb-2">
                @method('PATCH')
                @include('customers.form')
        
                <button type="submit" class="btn btn-primary">Save Customer</button>        
                
            </form>
        </div>
    </div>
    
@endsection
