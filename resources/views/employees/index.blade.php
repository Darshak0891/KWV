@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Session</span>
                          <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">21,459</h4>
                            <span class="text-success">(+29%)</span>
                          </div>
                          <span>Total Users</span>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                          <i class="ti ti-user ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Paid Users</span>
                          <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">4,567</h4>
                            <span class="text-success">(+18%)</span>
                          </div>
                          <span>Last week analytics </span>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                          <i class="ti ti-user-plus ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Active Users</span>
                          <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">19,860</h4>
                            <span class="text-danger">(-14%)</span>
                          </div>
                          <span>Last week analytics</span>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                          <i class="ti ti-user-check ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                          <span>Pending Users</span>
                          <div class="d-flex align-items-center my-1">
                            <h4 class="mb-0 me-2">237</h4>
                            <span class="text-success">(+42%)</span>
                          </div>
                          <span>Last week analytics</span>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                          <i class="ti ti-user-exclamation ti-sm"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Users List Table -->                
                <div class="card">
                <h5 class="card-header">Employee List</h5>
                <div class="row" align="right">
                  <div class="col-12">
                <a class="btn btn-primary me-sm-3 me-1 data-submit float-right" 
                href="{{ route('employees.create') }}">Add Employee</a>
                  </div>
                </div>
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
                        <th>Is Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($employee as $key => $employees)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{$employees->name}}</td>
                        <td>{{$employees->email}}</td>
                        <td>{{$employees->phone}}</td>
                        <td>
                        <label class="switch switch-primary">
                            <input type="checkbox" class="switch-input" {{$employees->is_active ? 'checked' : '' }}/>
                            <span class="switch-toggle-slider">
                              <span class="switch-on">
                                <i class="ti ti-check"></i>
                              </span>
                              <span class="switch-off">
                                <i class="ti ti-x"></i>
                              </span>
                            </span>
                          </label>
                        </td>
                        <!-- @if($employees->is_active == 0)         
                        <td>In Active</td>         
                        @else
                        <td>Active</td>        
                        @endif -->
                        <!-- <td>{{$employees->is_active}}</td> -->
                        <td class="text-center">
                            <a href="{{ route('employees.edit', $employees->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('employees.delete', $employees->id)}}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')" type="submit">Delete</button>
                              </form>
                        </td>
                    </tr>
                    @endforeach  
                    </tbody>
                  </table>
                </div>
              
            </div>
            
@endsection
    