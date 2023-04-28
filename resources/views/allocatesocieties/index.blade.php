@extends('layouts.app')
@section('content')
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Allocated Society /</span> Society List</h4>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Society Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($society as $data)
                        <tr>
                            <td>{{ $data->society_name }}</td>
                            <td><a href="{{ route('allocatesocieties.show', $data->id) }}" class="btn btn-primary">Show
                                    House</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection