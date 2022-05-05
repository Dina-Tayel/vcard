@extends('layouts.master')
@section('title')
    Edit profile data
@endsection
@section('css')
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
                            <h4>VCart Data</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{ route('userProfile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="profile-name"> Profile name</label>
                                <input type="text" name="profile_name"
                                    class="form-control @error('profile_name') is-invalid @enderror"" id=" profile-name"
                                     value="{{ $profile->profile_name }}">
                                @error('profile_name')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="profile-phone"> Phone</label>
                                <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    id="profile-phone"  value="{{ $profile->phone }}">
                                @error('phone')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="profile-email"> Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" id="profile-email"
                                    value="{{ $profile->email }}">
                                @error('email')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-3 col-md-6">
                                <label for="profile-facebook"> facebok url</label>
                                <input type="url" name="fb" class="form-control @error('fb') is-invalid @enderror"
                                    id="profile-phone"  value="{{ $profile->fb }}">
                                @error('fb')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="profile-phone"> Linkenin</label>
                                <input type="text" name="linkedin"
                                    class="form-control @error('linkedin') is-invalid @enderror" id="profile-linkedin"
                                     value="{{ $profile->linkedin }}">
                                @error('linkedin')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-4 col-md-6">
                                <label for="profile-name">GitHub</label>
                                <input type="url" name="github"
                                    class="form-control @error('github') is-invalid @enderror" id=" profile-github"
                                     value="{{ $profile->github }}">
                                @error('github')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="custom-file mb-4 col-md-6">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <input type="file" name="profile_pic" class="custom-file-input" id="customFile">
                                @error('profile_pic')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                                <img class="mt-4" src="{{ asset('uploads/profiles/' . $profile->profile_pic) }} " height="50px">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-1">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/back/plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/back/assets/js/scrollspyNav.js') }}"></script>
@endsection