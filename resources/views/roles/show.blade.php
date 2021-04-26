@extends('layouts.app')

@section('title', 'Role Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Role details</h1>
              
            <div class="btn-group" role="group">
                <a href="{{ route('roles.index') }}"><button type="button" class="btn btn-primary">Roles List</button></a>
                <a href="{{ route('roles.edit', ['role' => $role]) }}">
                    <button type="button" class="btn btn-primary mx-2">Edit</button>
                </a>
                <form action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>
            </div> 

        </div>
    </div>

    <div class="row my-3">
        <div class="col-12">
            <p><strong>Name:</strong> {{$role->name}}</p>
            <p><strong>Is Admin?:</strong> {{$role->is_admin}}</p>
        </div>
    </div>


    <h3>Permissions</h3>
    <div class="row">        
        <ul>
            @foreach ($role->permissions as $permission)
                <li>{{ $permission->name }}</li>
            @endforeach        
        </ul>
    </div>
    
    
    
@endsection
