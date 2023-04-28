@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Employee /</span> Employee List</h4>
    <!-- Users List Table -->
    <div class="card">

        @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
        @endif
        <br>
        <div class="input-group">
            <div class="form-outline">
                <form action="{{ route('employees.index') }}" role="search" method="GET">
                    <input type="search" name="search" class="form-control" placeholder="Search..." />
                </form>
            </div>
        </div>
        <br>
        <div class="row" align="right">
            <div class="col-12">
                <a class="btn btn-primary me-sm-3 me-1 data-submit float-right"
                    href="{{ route('employees.create') }}">Add Employee</a>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            List of Employees
                        </caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Email ID</th>
                                <th>Phone No.</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employee as $key => $employees)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{$employees->name}}</td>
                                <td>{{$employees->email}}</td>
                                <td>{{$employees->phone}}</td>
                                <!-- <td>
                                    <label class="switch switch-primary">
                                        <input type="checkbox" class="switch-input" {{$employees->is_active ? 'checked' : '' }} />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="ti ti-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="ti ti-x"></i>
                                            </span>
                                        </span>
                                    </label>
                                </td> -->
                                <!-- @if($employees->is_active == 0)         
                        <td>In Active</td>         
                        @else
                        <td>Active</td>        
                        @endif -->
                                <!-- <td>{{$employees->is_active}}</td> -->
                                <td class="text-center">
                                    <a href="{{ route('employees.edit', $employees->id)}}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('employees.delete', $employees->id)}}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this employee?')"
                                            type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table><br>

                    {{ $employee->links('pagination::bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection