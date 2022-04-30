@extends('layouts.master')
@section('title')
    Show all users in website
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Responsive Hover Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap text-center">
                <thead>
                    <tr>
                        <th>Profile name</th>
                        <th>Profile pic</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>facebook</th>
                        <th>Linkedin</th>
                        <th>github</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($profiles->count() > 0)
                        @foreach ($profiles as $profile)
                            <tr>
                                <td>{{ $profile->profile_name }}</td>
                                <td><img src="{{ asset('uploads/profiles/' . $profile->profile_pic) }}" width="50px"></td>
                                <td><a href="mailto:{{ $profile->email }}"><i class="far fa-envelope fa-2x"
                                            style="color: black"></i></a></td>
                                <td><a href="tel:{{ $profile->phone }}">{{ $profile->phone }}</a></td>
                                <td><a href="{{ $profile->fb }}"><i class="fab fa-facebook fa-2x"
                                            style="color: black"></i></a>
                                </td>
                                <td><a href="{{ $profile->linkedin }}"><i class="fab fa-linkedin fa-2x"
                                            style="color: black"></i></a></td>
                                <td><a href="{{ $profile->github }}"><i class="fab fa-github fa-2x"
                                            style="color: black"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('Allusers') }}" class="btn btn-success ">Back</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
