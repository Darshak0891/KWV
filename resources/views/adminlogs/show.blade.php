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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
                                <th>Society Name</th>
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
                                <th>Society Name</th>
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
                                <th>House No.</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Box_no</th>
                                <th>Rent</th>
                                <th>DC</th>
                                <th>NOD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $old_data->house_no }}</td>
                                <td>{{ $old_data->name }}</td>
                                <td>{{ $old_data->mobile_no }}</td>
                                <td>{{ $old_data->box_no }}</td>
                                <td>{{ $old_data->rent }}</td>

                                @if($old_data->dc == 0)
                                <td>Inactive</td>
                                @else
                                <td>Active</td>
                                @endif

                                @if($old_data->nod == 0)
                                <td>Inactive</td>
                                @else
                                <td>Active</td>
                                @endif
                            </tr>
                        </tbody>
                    </table><br>
                    <center><label>NEW DATA</label></center>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>House No.</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Box_no</th>
                                <th>Rent</th>
                                <th>DC</th>
                                <th>NOD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $new_data->house_no }}</td>
                                <td>{{ $new_data->name }}</td>
                                <td>{{ $new_data->mobile_no }}</td>
                                <td>{{ $new_data->box_no }}</td>
                                <td>{{ $new_data->rent }}</td>

                                @if($new_data->dc == 0)
                                <td>Inactive</td>
                                @else
                                <td>Active</td>
                                @endif

                                @if($new_data->nod == 0)
                                <td>Inactive</td>
                                @else
                                <td>Active</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection