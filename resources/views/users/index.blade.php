@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Users</h1>
            <a href="{{ route('users.create') }}"><button type="button" class="btn btn-success px-3">New</button></a>
        </div>
    </div>

    <div class="container mt-5">
        <table class="table table-bordered table-hover justify-content-center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td> 
                        <a class="btn btn-sm btn-primary" href="/users/{{ $user->id }}">View</a> 
                        <a class="btn btn-sm btn-success" href="{{ route('users.edit', ['user' => $user]) }}">Edit</a>
                        <form style="display:inline-block" action="{{ route('users.destroy', ['user' => $user]) }}" method="POST">
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
            {!! $users->appends(request()->except('page'))->links() !!}
            <br />            
        </div>

        <div class="d-flex justify-content-center">        
            Displaying {{$users->count()}} of {{ $users->total() }} number(s).       
        </div>

    </div>
    
@endsection
