@extends('layouts.master')

@section('css')
@endsection

@section('title')
@endsection

@section('content_title')
    Update profile
@endsection

@section('page1')
@endsection

@section('page2')
@endsection

@section('username')
    {{ $user->name }}
@endsection

@section('userpic')
    <img src="{{ asset('uploads/auth/' . auth()->user()->img) }}" class="img-circle elevation-2" alt="User Image">
@endsection

@section('dashboard')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('userProfile/create') }}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>Enter Your cart Data</p>
            </a>
        </li>
        {{-- @if ($profile->isNotEmpty()) @endif --}}
        <li class="nav-item">
            <a href="{{ url('userProfile/show/' . $user->id) }}" class="nav-link">
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
    <form action="{{ route('update', $userprofile->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ $userprofile->phone }}" name="phone" placeholder="phone">
            </div>
            @error('phone')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">FB</label>
                <input type="text" name="fb" value="{{ $userprofile->fb }}" class="form-control" placeholder="FB">
            </div>
            @error('fb')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Linkedin</label>
                <input type="text" name="linkedin" value="{{ $userprofile->linkedin }}" class="form-control"
                    placeholder="Linkedin">
            </div>
            @error('linkedin')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" value="{{ $userprofile->email }}" class="form-control"
                    placeholder="email">
            </div>
            @error('email')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputPassword1">Github</label>
                <input type="text" name="github" value="{{ $userprofile->github }}" class="form-control"
                    placeholder="Github">
            </div>
            @error('github')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group">
                <label for="exampleInputFile">File input</label>

                {{-- <input type="file"  name="profile_pic" class="custom-file-input" id="exampleInputFile"> --}}
                <input type="file" name="img" id="">

            </div>
            <img src="{{ asset('uploads/users/' . $userprofile->profile_pic) }} " height="50px">
            @error('img')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection


@section('scripts')
@endsection
