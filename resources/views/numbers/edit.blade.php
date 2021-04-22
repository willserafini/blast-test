@extends('layouts.app')

@section('title', 'Number Edit')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Number Edit</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('numbers.update', ['number' => $number]) }}" method="POST" class="pb-2">
                @method('PATCH')
                @include('numbers.form')
        
                <button type="submit" class="btn btn-primary">Save Number</button>        
                
            </form>
        </div>
    </div>
    
@endsection
