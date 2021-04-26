@extends('layouts.app')

@section('title', 'User Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>User Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('users.store') }}" method="POST" class="pb-2">
                
                @include('users.form')
        
                <button type="submit" class="btn btn-primary">Add User</button>        
                
            </form>
        </div>
    </div>
    
@endsection
