@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}" class="text-muted fw-light">Employee &
            House</a> / House List</h4>
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
        <br>
        <div class="input-group">
            <div class="search">
                <form action="{{ route('employee_houses.show_house', $id) }}" role="search" method="GET">
                    <input type="search" name="search" class="form-control" placeholder="Search..." /><br>

                    <select name="system" id="system1">
                        <option value="all" {{ (request()->input('system') == 'all') ? 'selected' : '' }}>ALL
                        </option>
                        <option value="dc" {{ (request()->input('system') == 'dc') ? 'selected' : '' }}>DC
                        </option>
                        <option value="nod" {{ (request()->input('system') == 'nod') ? 'selected' : '' }}>NOD
                        </option>
                    </select>

                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <br>
        <div class="row" align="right">
            <div class="col-12">

                <br><br>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>House No.</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Box No.</th>
                                <th>Baki</th>
                                <th>Rent</th>
                                <th>Jama</th>
                                <th>Note</th>
                                <th>DC</th>
                                <th>Submit</th>
                                <th>Status</th>
                            </tr>
                        <tbody>
                            @foreach($show_house as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>

                                    <form method="post" action="{{ route('employee_houses.actionpost', $data->id) }}">
                                        @csrf
                                        @method('POST')

                                        <input type="text" name="house_no" value="{{ $data->house_no }}" size="5" />

                                <td> <input type="text" name="name" value="{{ $data->name }}" size="25" /></td>
                                <td> <input type="text" name="mobile_no" value="{{ $data->mobile_no }}" size="10" />
                                </td>
                                <td> <input type="text" name="box_no" value="{{ $data->box_no }}" size="15" /></td>

                                <td> <input type="text" name="baki" value="{{ $data->baki }}" size="3" /></td>

                                <td> <input type="text" name="rent" value="{{ $data->rent }}" size="3" /></td>

                                <td> <input type="text" name="jama" value="{{ $data->jama }}" size="3" /></td>

                                <td><input type="text" name="remark" value="{{ $data->remark }}" placeholder="Note"
                                        size="9" /></td>

                                <td> <input type="radio" name="dc" value="1" {{ ($data->dc=="1") ? "checked" : "" }}
                                        required="" class="form-check-input">Yes
                                    <input type="radio" name="dc" value="0" {{ ($data->dc=="0") ? "checked" : "" }}
                                        required="" class="form-check-input">No
                                </td>

                                <input type="hidden" name="actionid" value="{{ $data->hId }}">

                                <td> <button type="submit" class="btn-default">Submit</button></td>
                                </form>
                                </td>
                                @if($data->baki == 0)
                                <td><button class="btn btn-success" disabled>Completed</button></td>
                                @else
                                <td> <button class="btn btn-warning" disabled>Pending</button> </td>
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