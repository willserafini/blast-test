@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Customers</h1>
            <a href="{{ route('customers.create') }}"><button type="button" class="btn btn-success px-3">New</button></a>
        </div>
    </div>

    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <input type="text" class="form-control mr-2" id="customer_name" name="customer_name" placeholder="Customer..." value="{{ $filter['customer_name'] ?? '' }}">
        </div>
        
        <button type="submit" class="btn btn-outline-primary mb-2 ml-2">Filter</button>
    </form>


    <div class="container mt-5">
        <table class="table table-bordered table-hover justify-content-center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Document</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                    <th scope="row">{{ $customer->id }}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->document }}</td>
                    <td>{{ $customer->status }}</td>
                    <td> 
                        <a class="btn btn-sm btn-primary" href="/customers/{{ $customer->id }}">View</a> 
                        <a class="btn btn-sm btn-success" href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a>
                        <form style="display:inline-block" action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                            @method('DELETE')
                            
                            <button class="btn btn-sm btn-danger">Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $customers->links() !!}
            <br />            
        </div>

        <div class="d-flex justify-content-center">        
            Displaying {{$customers->count()}} of {{ $customers->total() }} number(s).       
        </div>

    </div>
    
@endsection
