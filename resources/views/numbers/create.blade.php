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
                
                <button type="submit" name="add_number_and_pref" value="1" class="btn btn-success">Add Number + Create Preference</button>  
                
            </form>
        </div>
    </div>
    
@endsection
