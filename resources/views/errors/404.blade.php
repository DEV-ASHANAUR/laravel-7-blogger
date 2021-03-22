@extends('errors.errors_layouts')
@section('error')
    Not Found | 404 
@endsection
@section('error-content')
    <h2>404</h2>
    <p>Sorry !! page Not Found !</p>
    {{-- <p>{{ $exception->getMessage() }}</p> --}}

   
    <a href="{{ route('home.index') }}">Back To Home</a>
    

@endsection