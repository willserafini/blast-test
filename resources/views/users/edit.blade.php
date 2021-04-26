@extends('layouts.app')

@section('title', 'User Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>User Edit</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('users.update', ['user' => $user]) }}" method="POST" class="pb-2">
                @method('PATCH')
                <div class="form-group mb-3">
                    <span class="form-group-text" id="basic-addon1">Name</span>
                    <input value="{{ old('name') ?? $user->name }}" type="text" class="form-control" name="name" aria-label="Name" aria-describedby="basic-addon1">
                </div>
                
                <div>{{ $errors->first('name') }}</div>
                
                <div class="form-group mb-3">
                    <span class="form-group-text" id="basic-addon1">Role</span>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="" disabled>Select a Role</option>
                
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>{{ $errors->first('role_id') }}</div>
                
                @csrf
        
                <button type="submit" class="btn btn-primary">Save User</button>        
                
            </form>
        </div>
    </div>
    
@endsection
