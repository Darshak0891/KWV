@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <div class="card-body">
        <h5 class="card-header">Society List</h5>
        <div class="table responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <td>Society Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($show as $data)
                    <tr>
                        <td>{{$data->society_name}}</td>
                        <td>
                            <a href="{{ route('employee_houses.show_house', $data->id) }}" class="btn btn-primary">Show Houses</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection