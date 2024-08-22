@extends('layouts')

@section('title','Home Page')

@section('content')

@auth
<h3>Hi {{auth()->user()->name}} </h3>
@endauth
<h1>Home Page</h1>

@endsection
