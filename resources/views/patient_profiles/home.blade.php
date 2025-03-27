@extends('components.patient') <!-- Ensure you extend the correct layout -->

@section('content')
    <h1>Welcome, {{ Auth::user()->firstname }}!</h1>
    <p>You are logged in.</p>

   
@endsection
