@extends('layouts.app')

@section('title', 'Number Preferences')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Number Preferences</h1>
            <a href="{{ route('number_preferences.create') }}"><button type="button" class="btn btn-success px-3">Add Preference</button></a>
        </div>
    </div>    

    <form class="form-inline" method="GET">
        <div class="form-group mb-2">
            <input type="text" class="form-control mr-2" id="customer_name" name="customer_name" placeholder="Customer..." value="{{ $filter['customer_name'] ?? '' }}">
            <input type="text" class="form-control" id="number" name="number" placeholder="Number..." value="{{ $filter['number'] ?? '' }}">            
        </div>
        
        <button type="submit" class="btn btn-outline-primary mb-2 ml-2">Filter</button>
    </form>

    <div class="container mt-5">
        <table class="table table-bordered table-hover justify-content-center">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Costumer</th>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Value</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($numberPreferences as $preference)
                <tr>
                    <th scope="row">{{ $preference->id }}</th>
                    <td>{{ $preference->number->costumer->name }}</td>
                    <td>{{ $preference->number->number }}</td>                    
                    <td>{{ $preference->name }}</td>
                    <td>{{ $preference->value }}</td>
                    <td> 
                        <a class="btn btn-sm btn-primary" href="/number_preferences/{{ $preference->id }}">View</a> 
                        <a class="btn btn-sm btn-success" href="{{ route('number_preferences.edit', ['number_preference' => $preference]) }}">Edit</a>
                        <form style="display:inline-block" action="{{ route('number_preferences.destroy', ['number_preference' => $preference]) }}" method="POST">
                            @method('DELETE')
                            
                            <button class="btn btn-sm btn-danger">Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $numberPreferences->links() !!}

            <br />
            
        </div>

    <div class="d-flex justify-content-center">        
        Displaying {{$numberPreferences->count()}} of {{ $numberPreferences->total() }} number preference(s).       
    </div>

        

    </div>

@endsection
