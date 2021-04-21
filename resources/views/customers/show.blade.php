@extends('layout')

@section('title', 'Customer Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Details for {{$customer->name}}</h1>
            <p><a href="/customers/{{ $customer->id }}/edit">Edit</a></p>
            <form action="/customers/{{ $customer->id }}" method="POST">
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Delete</button>
                @csrf
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <p><strong>Name</strong> {{$customer->name}}</p>
            <p><strong>Email</strong> {{$customer->email}}</p>
            <p><strong>Company</strong> {{$customer->company->name}}</p>
        </div>
    </div>
    
@endsection
