@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">House /</span> House List</h4>
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
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <br><br>
        <div class="input-group">
            <div class="search">
                <form action="{{ route('houses.index') }}" role="search" method="GET">
                    <input type="search" name="search" class="form-control" placeholder="Search..." />
                </form>
            </div>
        </div><br>

        <div class="row" align="right">
            <div class="col-12">
                <a class="btn btn-primary me-sm-3 me-1 data-submit float-right" href="{{ route('houses.create') }}">Add
                    House</a>
                <a class="btn btn-primary me-sm-3 me-1 data-submit float-right" href="{{ route('houses.fileImportExport') }}">Import
                    House</a>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            List of Houses
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>House No.</th>
                                <th>Name</th>
                                <th>Society</th>
                                <th>Mobile Number</th>
                                <th>Box Number</th>
                                <th>Rent</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($house as $key => $houses)
                            <tr>
                                <td>{{ ($house->currentpage()-1) * $house->perpage() + $key + 1 }} </td>
                                <td>{{$houses->house_no}}</td>
                                <td>{{ $houses->name }}</td>
                                <td>{{$houses->society_name}}</td>
                                <td>{{$houses->mobile_no}}</td>
                                <td>{{$houses->box_no}}</td>
                                <td>{{$houses->rent}}</td>
                                <td>
                                    <a href="{{ route('houses.edit', $houses->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                    <form action="{{ route('houses.delete', $houses->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this house?')" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="page">
                        {{ $house->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection