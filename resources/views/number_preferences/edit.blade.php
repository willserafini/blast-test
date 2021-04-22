@extends('layouts.app')

@section('title', 'Preference Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Preference Edit</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('number_preferences.update', ['number_preference' => $numberPreference]) }}" method="POST" class="pb-2">
                @method('PATCH')
                @include('number_preferences.form')
        
                <button type="submit" class="btn btn-primary">Save Preference</button>        
                
            </form>
        </div>
    </div>
    
@endsection
