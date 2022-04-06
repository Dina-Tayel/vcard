@extends('layouts.master')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('title')
@endsection

@section('content_title')
@endsection

@section('page1')
@endsection

@section('page2')
@endsection

@section('username')
    {{ $user->name }}
@endsection

@section('userpic')
<img src="{{ asset('uploads/auth/'.$user->img) }}" class="img-circle elevation-2" alt="User Image">
  @endsection

@section('dashboard')
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('userProfile/create') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Enter Your cart Data</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Your Data</p>
            </a>
        </li>
    </ul>
@endsection

@if (Session::has('success'))
    <div class="alert alert-success text-center">{{ Session::get('success')}}</div>
@endif

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
                            <td><img src="{{ asset('uploads/users/' . $data->profile_pic) }}" width="60px"></td>
                            <td>{{ $data->phone }}</td>
                            <td><a href="{{ $data->email }}"><i class="far fa-envelope fa-2x" style="color: black"  ></i></a></td>
                            <td><a href="{{ $data->fb }}"><i class="fab fa-facebook fa-2x"  style="color: black"></i></a></td>
                            <td><a href="{{ $data->linkedin }}"><i class="fab fa-linkedin fa-2x"  style="color: black"></i></a></td>
                            <td><a href="{{ $data->github }}"><i class="fab fa-github fa-2x"  style="color: black"></i></a></td>
                            <td>
                                <form method="POST" action="{{ route('delete', $data->id) }}">
                                    @csrf
                                    <a href="{{ route('edit', $data->id) }}" onclick=" return confirm('Are You Really Want to update');" class="btn btn-success m-1">Update</a>
                                    
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"  onclick=" return confirm('Are You Really Want to delete');" >  Delete</button>
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

@section('scripts')
@endsection
