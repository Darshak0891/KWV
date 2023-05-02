@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Notificaitons </h4>
    <!-- Users List Table -->
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employer</th>
                                <th>House No</th>
                                <th>Society Name</th>
                                <th>Jama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive">
                                @foreach($data as $key => $notification)
                                <tr>
                                    <td>{{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}</td>
                                    <td>{{ $notification->name}}</td>
                                    <td>{{ $notification->house_no}}</td>
                                    <td>{{ $notification->society_name}}</td>
                                    <td>{{ $notification->jama}}</td>
                                </tr>
                                @endforeach
                            </a>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection