@extends('layouts.master')
@section('page_name')
    Edit profile data
@endsection
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
