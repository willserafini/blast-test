@extends('layouts.app')

@section('title', 'Customer Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Customer details</h1>
              
            <div class="btn-group" role="group">
                @can('viewAny', $customer)
                    <a href="{{ route('customers.index') }}"><button type="button" class="btn btn-primary">Costumers List</button></a>
                @endcan

                @can('update', $customer)
                    <a href="{{ route('customers.edit', ['customer' => $customer]) }}">
                        <button type="button" class="btn btn-success mx-2">Edit</button>
                    </a>
                @endcan

                @can('update', $customer)
                    <a href="{{ route('customers.view_permissions', ['customer' => $customer]) }}">
                        <button type="button" class="btn btn-secondary mx-2">Multiple Users</button>
                    </a>
                @endcan

                @can('delete', $customer)
                    <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                        @method('DELETE')
                        
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @csrf
                    </form>
                @endcan
            </div> 

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p><strong>Name:</strong> {{$customer->name}}</p>
            <p><strong>Document:</strong> {{$customer->document}}</p>
            <p><strong>Status:</strong> {{$customer->status}}</p>
            <p><strong>User who created:</strong> {{$customer->user->name}}</p>
        </div>
    </div>

    <h3>Another users who can see this account</h3>
    <div class="row ml-3">        
        <ul>
            @foreach ($customer->getUsersCanSee() as $user)
                <li>{{ $user->name }}</li>
            @endforeach        
        </ul>
    </div>


    
    
@endsection
