@extends('layouts.app')

@section('title', 'Roles')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Roles</h1>
            <a href="{{ route('roles.create') }}"><button type="button" class="btn btn-success px-3">Add Role</button></a>
        </div>
    </div>    

    <div class="container mt-5">
        <table class="table table-bordered table-hover justify-content-center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Is Admin?</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <th scope="row">{{ $role->id }}</th>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->is_admin }}</td>
                    <td> 
                        <a class="btn btn-sm btn-primary" href="/roles/{{ $role->id }}">View</a> 
                        <a class="btn btn-sm btn-success" href="{{ route('roles.edit', ['role' => $role]) }}">Edit</a>
                        <form style="display:inline-block" action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST">
                            @method('DELETE')
                            
                            <button class="btn btn-sm btn-danger"> Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $roles->appends(request()->except('page'))->links() !!}

            <br />
            
        </div>

        <div class="d-flex justify-content-center">        
            Displaying {{$roles->count()}} of {{ $roles->total() }} role(s).       
        </div>

    </div>

@endsection
