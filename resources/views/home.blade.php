@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="container h-100">
    <div class="d-flex justify-content-center">  
        <h3>Welcome to the Laravel Project!</h3>
    </div>
    
    @guest
    <div class="d-flex justify-content-center">  
        If you want to access the system you will need to login first.  
    </div>
    
    <div class="d-flex justify-content-center mt-3">  
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}"> Login page</a>
    </div>
    @endguest
</div>
    
@endsection
