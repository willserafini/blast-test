@extends('layout')

@section('title', 'Customer Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST" class="pb-2">
                
                @include('customers.form')
        
                <button type="submit" class="btn btn-primary">Add Customer</button>        
                
            </form>
        </div>
    </div>
    
@endsection
