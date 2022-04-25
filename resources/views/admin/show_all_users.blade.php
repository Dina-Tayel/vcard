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
                        <th>user name</th>
                        <th>Email</th>
                        <th>image</th>
                        <th>profiles count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td><img src="{{ asset('uploads/auth/' . $user->img) }}" width="50px"></td>
                            <td>{{ $user->profile_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
