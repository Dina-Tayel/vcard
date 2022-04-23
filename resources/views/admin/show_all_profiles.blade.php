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
                        <th>profile name</th>
                        <th>profile image</th>
                        <th>profile Email</th>
                        <th>profile phone</th>
                        <th>user </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>{{ $profile->profile_name }}</td>
                            <td><img src="{{ asset('storage/profiles/' . $profile->profile_pic) }}" width="50px"></td>
                            <td><a href="mailto:{{ $profile->email }}">{{ $profile->email }}</a></td>
                            <td>{{ $profile->phone }}</td>
                            <td>{{ $profile->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
