@extends('layouts.master')

@section('css')
@endsection

@section('title')
@endsection

@section('content_title')
    Update User
@endsection

@section('page1')
@endsection

@section('page2')
@endsection

@section('username')
    {{ auth()->user()->name }}
@endsection

@section('userpic')
<img src="{{ asset('uploads/auth/'.auth()->user()->img) }}" class="img-circle elevation-2" alt="User Image">
@endsection

@section('dashboard')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('userProfile/create') }}" class="nav-link ">
                <i  class="far fa-circle nav-icon"></i>
                <p>Enter Your cart Data</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('userProfile/show') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show your Data</p>
            </a>
        </li>
    </ul>
@endsection

@if (Session::has('success'))
    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
@endif

@section('content')
    <form action="{{ url('update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ $user->name }}" name="name" placeholder="name">
            </div>
            @error('name')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
            </div>
            @error('email')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">password</label>
                <input type="password" name="password" value="" class="form-control" placeholder="password">
            </div>
            @error('password')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="img" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            <img src="{{ asset('uploads/auth/'.auth()->user()->img) }}" class="img-circle elevation-2" width="50px" alt="User Image">
            @error('img')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-danger">Delete</a>
        </div>
    </form>

@endsection


@section('scripts')
@endsection
