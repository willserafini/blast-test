@extends('layouts.app')

@section('title', 'Role Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Role Edit</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST" class="pb-2">
                @method('PATCH')
                @include('roles.form')
        
                <button type="submit" class="btn btn-primary">Save Role</button>        
                
            </form>
        </div>
    </div>
    
@endsection
