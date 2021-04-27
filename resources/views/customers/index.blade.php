@extends('layouts.app')

@section('title', 'Customers')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Customers</h1>
            @can('create', \App\Models\Customer::class)
                <a href="{{ route('customers.create') }}"><button type="button" class="btn btn-success px-3">New</button></a>
            @endcan
            
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
                        @can('view', $customer)
                            <a class="btn btn-sm btn-primary" href="/customers/{{ $customer->id }}">View</a> 
                        @endcan
                        
                        @can('update', $customer)
                            <a class="btn btn-sm btn-success" href="{{ route('customers.edit', ['customer' => $customer]) }}">Edit</a>
                        @endcan

                        @can('update', $customer)
                            <a class="btn btn-sm btn-secondary" href="{{ route('customers.view_permissions', ['customer' => $customer]) }}">Multiple Users</a>
                        @endcan

                        @can('delete', $customer)
                        <form style="display:inline-block" action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                            @method('DELETE')
                            
                            <button class="btn btn-sm btn-danger">Delete</button>
                            @csrf
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $customers->appends(request()->except('page'))->links() !!}
            <br />            
        </div>

        <div class="d-flex justify-content-center">        
            Displaying {{$customers->count()}} of {{ $customers->total() }} number(s).       
        </div>

    </div>
    
@endsection
