@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <div class="card-body">
    <h5 class="card-header">House List</h5>
        <div class="table responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <td>House No.</td>
                        <td>Mobile No.</td>
                        <td>Box No.</td>
                        <td>Rent</td>
                        <td>Credit</td>
                        <td>Debit</td>
                    </tr>
                    <tbody>
                        @foreach($show_house as $data)
                        <tr>
                            <td>{{ $data->house_no }}</td>
                            <td>{{ $data->mobile_no }}</td>
                            <td>{{ $data->box_no }}</td>
                            <td>{{ $data->rent }}</td>
                            <td>{{ $data->credit }}</td>
                            <td>{{ $data->debit }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection