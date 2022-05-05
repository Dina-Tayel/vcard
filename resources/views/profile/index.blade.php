@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-md-12 col-sm-12 col-12">
    <div class="row">
    <h3 class="text-center m-5 col-md-6">Welcome {{ auth()->user()->name }} !</h3>
    @if (auth()->user()->role < 1)
        <p class="text-center col-md-6"> <a href="{{ url('userProfile/create') }}">Let's start make your new VCart</a> </p>
    @endif
   </div>
</div>
@endsection
