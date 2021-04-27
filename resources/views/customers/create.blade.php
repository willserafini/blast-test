@extends('layouts.app')

@section('title', 'Customer Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.store') }}" method="POST" class="pb-2">
                
                @include('customers.form')
        
                <button type="submit" class="btn btn-primary">Add Customer</button>
                
                <button type="submit" name="add_customer_and_number" value="1" class="btn btn-success">Add Customer + Create Number</button>  
                
                
            </form>
        </div>
    </div>
    
@endsection
