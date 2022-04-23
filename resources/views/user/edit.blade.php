@extends('layouts.master')
@section('title')
    Update Account
@endsection

{{-- @if (Session::has('success'))
    <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
@endif --}}

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
                <label for="exampleInputEmail1">username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    value="{{ $user->username }}" name="username" placeholder="username">
            </div>
            @error('username')
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
            <img src="{{ asset('storage/auth/' . auth()->user()->img) }}" class="img-circle elevation-2" width="50px"
                alt="User Image">
            @error('img')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <!-- /.card-body -->

        <div class=" d-flex justify-content-between col-md-12">
            <button type="submit" name="submit" class="btn btn-primary">Update Account</button>
        </div>
    </form>

    <form method="POST" action="{{ route('user.delete', auth()->user()->id) }}" class="dodo">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Are Youe sure you want to delete your account')"
            class="btn btn-danger">Delete Account</button>
    </form>
@endsection


@section('scripts')
@endsection
