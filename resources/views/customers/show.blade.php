@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer details</h1>
              
            <div class="btn-group" role="group">
                <a href="{{ route('customers.index') }}"><button type="button" class="btn btn-primary">Costumers List</button></a>
                <a href="{{ route('customers.edit', ['customer' => $customer]) }}">
                    <button type="button" class="btn btn-primary mx-2">Edit</button>
                </a>
                <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>
            </div> 

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p><strong>Name:</strong> {{$customer->name}}</p>
            <p><strong>Document:</strong> {{$customer->document}}</p>
            <p><strong>Status:</strong> {{$customer->status}}</p>
            <p><strong>User:</strong> {{$customer->user->name}}</p>
        </div>
    </div>


    
    
@endsection
