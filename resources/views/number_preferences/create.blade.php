@extends('layouts.app')

@section('title', 'Number Preference Create')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Number Preference Create</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('number_preferences.store') }}" method="POST" class="pb-2">
                
                @include('number_preferences.form')
        
                <button type="submit" class="btn btn-primary">Add Number Preference</button>        
                
            </form>
        </div>
    </div>
    
@endsection
