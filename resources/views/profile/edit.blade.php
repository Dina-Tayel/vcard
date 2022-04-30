@extends('layouts.master')
@section('title')
    Edit profile data
@endsection
@section('content')
    <form action="{{ route('userProfile.update', $profile->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body row">
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">profile name</label>
                <input type="text" name="profile_name" class="form-control @error('profile_name') is-invalid @enderror"
                    value="{{ $profile->profile_name }}" name="profile_name" placeholder="profile name">
            </div>
            @error('profile_name')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ $profile->phone }}" name="phone" placeholder="phone">
            </div>
            @error('phone')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">FB</label>
                <input type="text" name="fb" value="{{ $profile->fb }}" class="form-control" placeholder="FB">
            </div>
            @error('fb')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Linkedin</label>
                <input type="text" name="linkedin" value="{{ $profile->linkedin }}" class="form-control"
                    placeholder="Linkedin">
            </div>
            @error('linkedin')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" value="{{ $profile->email }}" class="form-control"
                    placeholder="email">
            </div>
            @error('email')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Github</label>
                <input type="text" name="github" value="{{ $profile->github }}" class="form-control"
                    placeholder="Github">
            </div>
            @error('github')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputFile">File input</label>

                {{-- <input type="file"  name="profile_pic" class="custom-file-input" id="exampleInputFile"> --}}
                <input type="file" name="profile_pic" id="">

            </div>
            <img src="{{ asset('uploads/profiles/' . $profile->profile_pic) }} " height="50px">
            @error('profile_pic')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
