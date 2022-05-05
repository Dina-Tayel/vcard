@extends('layouts.master')
@section('title')
    show profile data
@endsection
@section('css')
    <link href="{{ asset('assets/back/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/back/assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/back/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endsection
@section('content')
    <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Show Profiles</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>username</th>
                                <th>Email</th>
                                <th>image</th>
                                <th>profiles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td><a target="_blank" href="mailto:{{ $user->email }}"><img width="40" height="40"
                                                srcset="https://img.icons8.com/fluency/344/4a90e2/email-open.png 2x"
                                                alt="icon" loading="lazy"></a></td>
                                    <td><img src="{{ asset('uploads/auth/'. $user->img) }}" width="60px">
                                    </td>
                                    <td><a target="_blank" href="{{ route('user.profiles',$user->id) }}">{{ $user->profile_count }}</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/back/assets/js/scrollspyNav.js') }}"></script>
    <script>
        checkall('todoAll', 'todochkbox');
        $('[data-toggle="tooltip"]').tooltip()
    </script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
@endsection
