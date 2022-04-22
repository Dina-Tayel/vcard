@extends('layouts.master')
@section('content')
    <h3 class="text-center m-5">Welcome {{ auth()->user()->name }} !</h3>
    @if (auth()->user()->role < 1)
        <p class="text-center"> <a href="{{ url('userProfile/create') }}">Let's start make your new VCart</a> </p>
    @endif
@endsection
