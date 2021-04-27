@extends('layouts.app')

@section('title', 'Preference Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Preference details</h1>
              
            <div class="btn-group" role="group">
                <a href="{{ route('number_preferences.index') }}"><button type="button" class="btn btn-primary">Preference List</button></a>
                <a href="{{ route('number_preferences.edit', ['number_preference' => $numberPreference]) }}">
                    <button type="button" class="btn btn-success mx-2">Edit</button>
                </a>
                <form action="{{ route('number_preferences.destroy', ['number_preference' => $numberPreference]) }}" method="POST">
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>
            </div> 

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p><strong>Costumer:</strong> {{ $numberPreference->number->costumer->name }}</p>
            <p><strong>Number:</strong> {{ $numberPreference->number->number }}</p>
            <p><strong>Name:</strong> {{ $numberPreference->name }}</p>
            <p><strong>Value:</strong> {{ $numberPreference->value }}</p>

        </div>
    </div>
    
    
@endsection
