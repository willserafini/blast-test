@extends('layouts.app')

@section('title', 'Numbers')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <h1>Numbers</h1>
            <a href="{{ route('numbers.create') }}"><button type="button" class="btn btn-success px-3">Add Number</button></a>
        </div>
    </div>    

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Number</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($numbers as $number)
                <tr>
                    <th scope="row">{{ $number->id }}</th>
                    <td>{{ $number->costumer->name }}</td>
                    <td>{{ $number->number }}</td>
                    <td>{{ $number->status }}</td>
                    <td> 
                        <a class="btn btn-sm btn-primary" href="/numbers/{{ $number->id }}">View</a> 
                        <a class="btn btn-sm btn-success" href="{{ route('numbers.edit', ['number' => $number]) }}">Edit</a>
                        <form style="display:inline-block" action="{{ route('numbers.destroy', ['number' => $number]) }}" method="POST">
                            @method('DELETE')
                            
                            <button class="btn btn-sm btn-danger"> Delete</button>
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {!! $numbers->links() !!}

            <br />
            
        </div>

    <div class="d-flex justify-content-center">        
        Displaying {{$numbers->count()}} of {{ $numbers->total() }} number(s).       
    </div>

        

    </div>

@endsection
