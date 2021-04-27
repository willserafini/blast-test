@extends('layouts.app')

@section('title', 'Number Details')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Number details</h1>
              
            <div class="btn-group" role="group">
                <a href="{{ route('numbers.index') }}"><button type="button" class="btn btn-primary">Numbers List</button></a>
                <a href="{{ route('numbers.edit', ['number' => $number]) }}">
                    <button type="button" class="btn btn-success mx-2">Edit</button>
                </a>
                <form action="{{ route('numbers.destroy', ['number' => $number]) }}" method="POST">
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @csrf
                </form>
            </div> 

        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <p><strong>Costumer:</strong> {{$number->costumer->name}}</p>
            <p><strong>Number:</strong> {{$number->number}}</p>
            <p><strong>Status:</strong> {{$number->status}}</p>
        </div>
    </div>


    
    
@endsection
