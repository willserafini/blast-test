@extends('layouts.app')

@section('title', 'Role Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Role Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('roles.store') }}" method="POST" class="pb-2">
                
                @include('roles.form')
        
                <button type="submit" class="btn btn-primary">Add Role</button>        
                
            </form>
        </div>
    </div>
    
@endsection
