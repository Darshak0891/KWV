@extends('layouts.app')
@section('content')
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- -->
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Hello {{auth()->user()->name}}! </h5>
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
            <!--/ -->
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
                                        <i class="menu-icon tf-icons ti ti-building"></i>
                                    </div>
                                    <div class="card-info">

                                        <h5 class="mb-0">{{$totalSociety}}</h5>
                                        <small>Societies</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="menu-icon tf-icons ti ti-home"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$totalHouses}}</h5>
                                        <small>Houses</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <span style='font-size:20px;'>&#8377;</span>
                                        <!-- <p>I will display &#8377;</p>&#8377; -->
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$remainingCollection}}</h5>
                                        <small>Remaining Collection</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <span style='font-size:20px;'>&#8377;</span>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{$collected}}</h5>
                                        <small>Collected Money</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Statics  -->
        </div>
    </div>
</div>
@endsection