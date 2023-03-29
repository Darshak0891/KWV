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
                          <span>Total Houses</span>
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
                          <span>Total Societies</span>
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
                <h5 class="card-header">House List</h5>
                <div class="row" align="right">
                  <div class="col-12">
                <a class="btn btn-primary me-sm-3 me-1 data-submit float-right" 
                href="{{ route('houses.create') }}">Add House</a>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <caption class="ms-4">
                      List of Houses
                    </caption>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>House No.</th>
                        <th>Society</th>
                        <th>Mobile Number</th>
                        <th>Box Number</th>
                        <th>Rent</th>
                        <th>Credit</th>
                        <th>Debit</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($house as $key => $houses)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{$houses->house_no}}</td>
                        <td>{{$houses->society_name}}</td>
                        <td>{{$houses->mobile_no}}</td>
                        <td>{{$houses->box_no}}</td>
                        <td>{{$houses->rent}}</td>
                        <td>{{$houses->credit}}</td>
                        <td>{{$houses->debit}}</td>
                        <td class="text-center">
                            
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
