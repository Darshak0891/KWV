@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="table responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>OLD DATA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $old_data->name }}</td>
                        <td>{{ $old_data->email }}</td>
                        <td>{{ $old_data->phone }}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>NEW DATA</th>
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
        </div>
    </div>
</div>
@endsection