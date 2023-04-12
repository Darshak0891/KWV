@extends('layouts.app')
@section('content')
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <div class="card-body">
            <h5 class="card-header">Employee List</h5>
        <div class="row" align="right">
                <div class="col-12">
            <a class="btn btn-primary me-sm-3 me-1 data-submit float-right" 
            href="{{ route('employee_houses.create') }}">Add Employee&House</a>
                </div>
        </div>
        <div  class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Employee Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($emp_name as $key => $data)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $data->name }}</td>
                          <td>
                            <a href="{{ route('employee_houses.show', $data->id) }}" class="btn btn-primary">Show Society</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table><br>                               
            </div> 

    </div>
    </div>
</div>

@endsection