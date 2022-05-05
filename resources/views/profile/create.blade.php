@extends('layouts.master')

@section('css')
    <link href="{{ asset('assets/back/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    Enter profile data
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

                        <form action="{{ route('userProfile.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-3 col-md-6">
                                    <label for="profile-name"> Profile name</label>
                                    <input type="text" name="profile_name"
                                        class="form-control @error('profile_name') is-invalid @enderror"" id=" profile-name"
                                        placeholder="Profile Name" value="{{ old('profile_name') }}">
                                    @error('profile_name')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="profile-phone"> Phone</label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                        id="profile-phone" placeholder="(123) 456 789" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="profile-email"> Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="profile-email"
                                        placeholder="name@profile.com" value="{{ old('email') }}">
                                    @error('email')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group mb-3 col-md-6">
                                    <label for="profile-facebook"> facebok url</label>
                                    <input type="url" name="fb" class="form-control @error('fb') is-invalid @enderror"
                                        id="profile-phone" placeholder="https://dummyurl.com" value="{{ old('fb') }}">
                                    @error('fb')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label for="profile-phone"> Linkenin</label>
                                    <input type="text" name="linkedin"
                                        class="form-control @error('linkedin') is-invalid @enderror" id="profile-linkedin"
                                        placeholder="https://www.linkedin.com/in/name/" value="{{ old('linkedin') }}">
                                    @error('linkedin')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label for="profile-name">GitHub</label>
                                    <input type="url" name="github"
                                        class="form-control @error('github') is-invalid @enderror" id=" profile-github"
                                        placeholder="https://github.com/name" value="{{ old('github') }}">
                                    @error('github')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="custom-file mb-4 col-md-6 ml-3">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <input type="file" name="profile_pic" class="custom-file-input" id="customFile">
                                    @error('profile_pic')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>

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
