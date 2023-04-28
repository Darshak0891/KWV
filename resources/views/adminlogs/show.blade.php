@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Logs /</span> Admin Logs</h4>
    <!-- Users List Table -->
    <div class="card">
        <br>
        <div class="row" align="right">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    @if($show->type_id == 1)
                    <center><label>OLD DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $old_data->name }}</td>
                                <td>{{ $old_data->email }}</td>
                                <td>{{ $old_data->phone }}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    <center><label>NEW DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $new_data->name }}</td>
                                <td>{{ $new_data->email }}</td>
                                <td>{{ $new_data->phone }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @elseif($show->type_id == 2)
                    <center> <label>OLD DATA</label></center>
                    <table class="table">
                        <thead>

                            <tr>
                                <td>Society Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $old_data->society_name }}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    <center><label>NEW DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Society Name</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $new_data->society_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <center><label>OLD DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>House No.</td>
                                <td>Mobile No.</td>
                                <td>Box_no</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $old_data->house_no }}</td>
                                <td>{{ $old_data->mobile_no }}</td>
                                <td>{{ $old_data->box_no }}</td>
                            </tr>
                        </tbody>
                    </table><br>
                    <center><label>NEW DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>House No.</td>
                                <td>Mobile No.</td>
                                <td>Box_no</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $new_data->house_no }}</td>
                                <td>{{ $new_data->mobile_no }}</td>
                                <td>{{ $new_data->box_no }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection