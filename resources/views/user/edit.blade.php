@extends('layouts.master')
@section('title')
    Update Account
@endsection
@section('css')
     <link rel="stylesheet" href="{{ asset('assets/back/assets/css/style.css') }}">
    <link href="{{ asset('assets/back/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <div class="row">
            <div id="flStackForm" class="col-lg-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Edit account</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ url('update/' . Auth::id()) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="user-name"> Full Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        id=" user-fullname" value="{{ auth()->user()->name }}">
                                    @error('name')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="user-username"> Username</label>
                                    <input type="tel" name="username"
                                        class="form-control @error('username') is-invalid @enderror" id="user-username"
                                        value="{{ auth()->user()->username }}">
                                    @error('username')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="user-password"> password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="user-password">
                                    @error('password')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label for="user-email"> Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="user-email"
                                        value="{{ auth()->user()->email }}">
                                    @error('email')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="custom-file mb-4 col-md-6 ml-3">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <input type="file" name="profile_pic" class="custom-file-input" id="customFile" alt="User Image">
                                    @error('img')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                    <img class="mt-4" src="{{ asset('uploads/auth/' . auth()->user()->img) }} "
                                        height="50px">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-1">Update</button>
                        </form>
                        <form method="POST" action="{{ route('user.delete', auth()->user()->id) }}" class="dodo">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are Youe sure you want to delete your account')"
                                class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
