@extends('layouts.app')

@section('title', 'Multiple Users')

@section('content')

    <div class="row">
        <div class="col-12">
            <h1>Multiple Users</h1>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('customers.update_permissions', ['customer' => $customer]) }}" method="POST" class="pb-2">
                @method('PATCH')
                
                <div class="form-check mb-3">
    
                    @foreach ($users as $key => $user)
                    <div>
                        <input name="permissions[users][]" {{ $customer->userIsInPermissions($user) ? 'checked' : '' }}  value="{{ $user->id }}" class="form-check-input" type="checkbox" id="flexCheckDefault{{ $key }}">
                        <label class="form-check-label" for="flexCheckDefault{{ $key }}">{{ $user->name }}</label>
                    </div>
                    @endforeach 
                
                </div>
                
                @csrf
        
                <button type="submit" class="btn btn-primary">Save Users</button>        
                
            </form>
        </div>
    </div>
    
@endsection
