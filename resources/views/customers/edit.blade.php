@extends('layouts.app')

@section('title', 'Customer Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer Edit {{$customer->name}}</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST" class="pb-2">
                @method('PATCH')
                @include('customers.form')
        
                <button type="submit" class="btn btn-primary">Save Customer</button>        
                
            </form>
        </div>
    </div>
    
@endsection
