@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}" class="text-muted fw-light">Employee &
            House</a> / Society List</h4>
    <!-- Users List Table -->
    <div class="card">
        <br>
        <div class="row" align="right">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Society Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($show as $data)
                            <tr>
                                <td>{{$data->society_name}}</td>
                                <td>
                                    <a href="{{ route('employee_houses.show_house', $data->societyId) }}" class="btn btn-primary">Show Houses</a>
                                    <form action="{{ route('employee_houses.delete', $data->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this society?')" type="submit" style="height:38px;">Remove Society</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection