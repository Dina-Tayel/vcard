@extends('layouts.master')
@section('title')
    show profile data
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
                        <th>Phone</th>
                        <th>Email</th>
                        <th>facebook</th>
                        <th>Linkedin</th>
                        <th>github</th>
                        <th class="colgroup">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userprofile as $data)
                        <tr>
                            <td>{{ $data->profile_name }}</td>
                            <td><img src="{{ asset('storage/profiles/' . $data->profile_pic) }}" width="60px"></td>
                            <td><a href="tel:{{ $data->phone }}">{{ $data->phone }}</a></td>
                            <td><a href="mailto:{{ $data->email }}"><i class="far fa-envelope fa-2x"
                                        style="color: black"></i></a>
                            </td>
                            <td><a href="{{ $data->fb }}"><i class="fab fa-facebook fa-2x" style="color: black"></i></a>
                            </td>
                            <td><a href="{{ $data->linkedin }}"><i class="fab fa-linkedin fa-2x"
                                        style="color: black"></i></a></td>
                            <td><a href="{{ $data->github }}"><i class="fab fa-github fa-2x" style="color: black"></i></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('delete', $data->id) }}">
                                    @csrf
                                    <a href="{{ route('edit', $data->id) }}"
                                        onclick=" return confirm('Are You Really Want to update');"
                                        class="btn btn-success m-1">Update</a>

                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick=" return confirm('Are You Really Want to delete');"> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
