@extends('layouts.master')

@section('title')
    Enter profile data
@endsection

@section('content')
    <form action="{{ url('userProfile/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body row">
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">profile name</label>
                <input type="text" name="profile_name" class="form-control" value="{{ old('profile_name') }}"
                    placeholder="profile name">
            </div>

            @error('profile_name')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputEmail1">phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" name="phone"
                    placeholder="phone">
            </div>
            @error('phone')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">FB</label>
                <input type="text" name="fb" value="{{ old('fb') }}" class="form-control" placeholder="FB">
            </div>
            @error('fb')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Linkedin</label>
                <input type="text" name="linkedin" value="{{ old('linkedin') }}" class="form-control"
                    placeholder="Linkedin">
            </div>
            @error('linkedin')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
            </div>
            @error('email')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputPassword1">Github</label>
                <input type="text" name="github" value="{{ old('github') }}" class="form-control" placeholder="Github">
            </div>
            @error('github')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
            <div class="form-group col-md-12">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="profile_pic" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
            @error('profile_pic')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
