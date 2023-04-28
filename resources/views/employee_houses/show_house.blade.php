@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}" class="text-muted fw-light">Employee &
            House</a> / House List</h4>
    <!-- Users List Table -->
    <div class="card">
        <br>
        <div class="row" align="right">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>House No.</td>
                                <td>Name</td>
                                <td>Mobile No.</td>
                                <td>Box No.</td>
                                <td>Baki</td>
                                <td>Rent</td>
                                <td>Jama</td>
                                <td>Status</td>
                            </tr>
                        <tbody>
                            @foreach($show_house as $key => $data)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $data->house_no }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->mobile_no }}</td>
                                <td>{{ $data->box_no }}</td>
                                <td>{{ $data->baki }}</td>
                                <td>{{ $data->rent }}</td>
                                <td>
                                    <form method="post" id="action" action="{{ route('allocatesocieties.actionpost', $data->hId) }}">
                                        @csrf
                                        @method('POST')

                                        <input type="text" name="jama" value="{{ $data->jama }}" size="3" />
                                        <input type="text" name="remark" value="{{ $data->remark }}" size="7" />

                                        <input type="hidden" name="actionid" value="{{ $data->hId }}">
                                        <button type="submit">Submit</button>
                                    </form>
                                </td>
                                @if($data->baki == 0)
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