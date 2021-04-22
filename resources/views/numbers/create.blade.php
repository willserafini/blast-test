@extends('layouts.app')

@section('title', 'Number Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Number Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('numbers.store') }}" method="POST" class="pb-2">
                
                @include('numbers.form')
        
                <button type="submit" class="btn btn-primary">Add Number</button>        
                
            </form>
        </div>
    </div>
    
@endsection
