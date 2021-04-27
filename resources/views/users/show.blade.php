@extends('layouts.app')

@section('title', 'User Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>User details</h1>
              
            <div class="btn-group" role="group">
                <a href="{{ route('users.index') }}"><button type="button" class="btn btn-primary">User List</button></a>
                <a href="{{ route('users.edit', ['user' => $user]) }}">
                    <button type="button" class="btn btn-success mx-2">Edit</button>
                </a>
                <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>
            </div> 

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Role:</strong> {{ $user->role->name }}</p>
        </div>
    </div>


    
    
@endsection
