@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl-4 mb-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h3 class="card-title mb-0">Hey {{auth()->user()->name}}! </h5>
                                <p class="mb-2">WELCOME TO KWV!</p>
                                <!-- <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a> -->
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../../assets/img/illustrations/card-advance-sale.png" height="140" alt="view sales" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-xl-8 mb-4 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">REPORT</h5>
                        <!-- <small class="text-muted">Updated 1 month ago</small> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="menu-icon tf-icons ti ti-users"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalEmp}}</h5>
                                    <small>Employees</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-info me-3 p-2">
                                    <i class="menu-icon tf-icons ti ti-building"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalSoc}}</h5>
                                    <small>Societies</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                    <i class="menu-icon tf-icons ti ti-home"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{$totalHouse}}</h5>
                                    <small>Houses</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-success me-3 p-2">
                                    <span style='font-size:20px;'>&#8377;</span>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0"> {{$todayCollection}}</h5>
                                    <small>Today's Collection</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Statics  -->


        <!--Browser States -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title m-0 me-2">
                        <h5 class="m-0 me-2">Employers Society</h5>
                        <!-- <small class="text-muted">Counter April 2022</small> -->
                    </div>

                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach($userSocietyData as $data)
                        <li class="d-flex mb-4 pb-1 align-items-center">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <!-- <img src="../../assets/img/icons/brands/chrome.png" alt="Chrome" height="28" class="me-3 rounded" /> -->
                            <div class="d-flex w-100 align-items-center gap-2">
                                <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                    <div>
                                        <h6 class="mb-0">{{$data->name}}</h6>
                                    </div>

                                    <div class="user-progress d-flex align-items-center gap-2">
                                        <h6 class="mb-0">{{$data->totalSociety}}</h6>
                                    </div>
                                </div>
                                <!-- <div class="chart-progress" data-color="secondary" data-series="85"></div> -->
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Browser States -->

        <div class="col-lg-8 mb-4 mb-lg-0">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title m-0 me-2">Employers Collection</h5>

                </div>
                <div class="table-responsive">
                    <table class="table table-borderless border-top">
                        <thead class="border-bottom">
                            <tr>
                                <th>Employee Name</th>
                                <th>Total houses</th>
                                <th>Total Rent</th>
                                <th>Total Baki</th>
                                <th>Total Jama</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userSociety as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->totalHouses }}</td>
                                <td>{{ $data->totalRents }}</td>
                                <td>{{ $data->totalBaki }}</td>
                                <td>{{ $data->totalJama }}</td>
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