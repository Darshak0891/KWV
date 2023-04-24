@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}" class="text-muted fw-light">Employee &
            House</a> / House List</h4>
    <!-- Users List Table -->
    <div class="card">
        <div class="row" align="right">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>House No.</td>
                                <td>Mobile No.</td>
                                <td>Box No.</td>
                                <td>Baki</td>
                                <td>Rent</td>
                                <td>Jama</td>
                                <td>Status</td>
                            </tr>
                        <tbody>
                            @foreach($show_house as $data)
                            <tr>
                                <td>{{ $data->house_no }}</td>
                                <td>{{ $data->mobile_no }}</td>
                                <td>{{ $data->box_no }}</td>
                                <td>{{ $data->baki }}</td>
                                <td>{{ $data->rent }}</td>
                                <td>{{ $data->jama }}</td>
                                @if($data->jama >= $data->rent)
                                <td><button class="btn btn-success" disabled>Completed</button></td>
                                @else
                                <td> <button class="btn btn-primary" disabled>Pending</button> </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection