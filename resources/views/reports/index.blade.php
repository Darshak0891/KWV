@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('reports.index') }}" action="get">
                @csrf


                <input type="date" name="to" value="{{ (request()->input('from')) ? request()->input('from') : '' }}" />
                TO
                <input type="date" name="to" value="{{ (request()->input('to')) ? request()->input('to') : '' }}" />

                <select name="report">
                    <option value="">All</option>
                    @foreach($user as $users)
                    <option value="{{ $users->id }}" {{ (request()->input('report') == $users->id) ? 'selected' : '' }}>
                        {{$users->name}}
                    </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <a class="btn btn-warning" href="{{ route('reports.export') }}">Export User Data</a>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>House No.</th>
                            <!-- <th>Name</th> -->
                            <th>Society</th>
                            <!-- <th>Mobile Number</th> -->
                            <th>Box Number</th>
                            <th>Baki</th>
                            <th>Rent</th>
                            <th>Jama</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->house_no }}</td>
                            <!-- <td>{{ $data->name }}</td> -->
                            <td>{{ $data->society_name }}</td>
                            <!-- <td>{{ $data->mobile_no }}</td> -->
                            <td>{{ $data->box_no }}</td>
                            <td>{{ $data->baki }}</td>
                            <td>{{ $data->rent }}</td>
                            <td>{{ $data->jama }}</td>
                            <td>{{ $data->date }}</td>
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