@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Logs /</span> Admin Logs</h4>
    <!-- Users List Table -->
    <style>
        .search {
            margin: 30px;
            margin-top: 5px;
            color: green;
        }

        .page {
            margin-bottom: 5px;
            margin-left: 400px;
        }
    </style>
    <div class="card">
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <br><br>
        <div class="input-group">
            <div class="search">
                <form action="{{ route('adminlogs.index') }}" role="search" method="GET">
                    <input type="search" name="search" class="form-control" placeholder="Search..." />
                </form>
            </div>
        </div>

        <div class="row" align="right">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>USER ID</th>
                                <th>TYPE</th>
                                <th>ACTION TYPE</th>
                                <th>MESSAGE</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin_log as $key => $admin_logs)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $admin_logs->name }}</td>

                                @if($admin_logs->type_id == 1)
                                <td>Employee</td>
                                @elseif($admin_logs->type_id == 2)
                                <td>Society</td>
                                @elseif($admin_logs->type_id == 3)
                                <td>House</td>
                                @else
                                <td>Employee & Houses</td>
                                @endif


                                @if($admin_logs->action_type_id == 1)
                                <td>create</td>
                                @elseif($admin_logs->action_type_id == 2)
                                <td>update</td>
                                @else
                                <td>delete</td>
                                @endif

                                <!-- <td>{{ $admin_logs->request_id }}</td> -->
                                <td>{{ $admin_logs->message }}</td>
                                @if($admin_logs->action_type_id == 2)
                                <td><a class="btn btn-primary" href="{{ route('adminlogs.show', $admin_logs->id)}}">Show
                                        Updated
                                        Data</a></td>
                                @else
                                <td>-</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>
                    <div class="page">
                        {{ $admin_log->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection