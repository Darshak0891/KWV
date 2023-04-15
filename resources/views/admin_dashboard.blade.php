@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xl-4 mb-4 col-lg-5 col-12">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-7">
                            <div class="card-body text-nowrap">
                                <h5 class="card-title mb-0">Congratulations {{auth()->user()->name}}! 🎉</h5>
                                <p class="mb-2">Best seller of the month</p>
                                <h4 class="text-primary mb-1">$48.9k</h4>
                                <a href="javascript:;" class="btn btn-primary">View Sales</a>
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
                            <h5 class="card-title mb-0">Statistics</h5>
                            <small class="text-muted">Updated 1 month ago</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                        <i class="ti ti-chart-pie-2 ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">230k</h5>
                                        <small>Employees</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-info me-3 p-2">
                                        <i class="ti ti-users ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">8.549k</h5>
                                        <small>Societies</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-danger me-3 p-2">
                                        <i class="ti ti-shopping-cart ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">1.423k</h5>
                                        <small>Houses</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded-pill bg-label-success me-3 p-2">
                                        <i class="ti ti-currency-dollar ti-sm"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">$9745</h5>
                                        <small>Revenue</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Statics  -->
            <!-- Revenue Growth -->
            <div class="col-xl-4 col-md-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                                <div class="card-title mb-auto">
                                    <h5 class="mb-1 text-nowrap">Revenue Growth</h5>
                                    <small>Weekly Report</small>
                                </div>
                                <div class="chart-statistics">
                                    <h3 class="card-title mb-1">$4,673</h3>
                                    <span class="badge bg-label-success">+15.2%</span>
                                </div>
                            </div>
                            <div id="revenueGrowth"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/Revenue Growth -->
            <!--Browser States -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title m-0 me-2">
                            <h5 class="m-0 me-2">Browser States</h5>
                            <small class="text-muted">Counter April 2022</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="employeeList" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="employeeList">
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/chrome.png" alt="Chrome" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Google Chrome</h6>
                                        </div>

                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">90.4%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="secondary" data-series="85"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/safari.png" alt="Safari" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Apple Safari</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">70.6%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="success" data-series="70"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/firefox.png" alt="Firefox" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Mozilla Firefox</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">35.5%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="primary" data-series="25"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/opera.png" alt="Opera" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Opera Mini</h6>
                                        </div>

                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">80.0%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="danger" data-series="75"></div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1 align-items-center">
                                <img src="../../assets/img/icons/brands/edge.png" alt="Edge" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Internet Explorer</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">62.2%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="info" data-series="60"></div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <img src="../../assets/img/icons/brands/brave.png" alt="Brave" height="28" class="me-3 rounded" />
                                <div class="d-flex w-100 align-items-center gap-2">
                                    <div class="d-flex justify-content-between flex-grow-1 flex-wrap">
                                        <div>
                                            <h6 class="mb-0">Brave</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-2">
                                            <h6 class="mb-0">46.3%</h6>
                                        </div>
                                    </div>
                                    <div class="chart-progress" data-color="warning" data-series="45"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Browser States -->
            <!-- Active Project -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">Active Project</h5>
                            <small class="text-muted">Average 72% Completed</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="activeProjects" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="activeProjects">
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                <a class="dropdown-item" href="javascript:void(0);">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/laravel-logo.png" alt="laravel-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">Laravel</h6>
                                        <small class="text-muted">eCommerce</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">54%</span>
                                </div>
                            </li>
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/figma-logo.png" alt="figma-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">Figma</h6>
                                        <small class="text-muted">App UI Kit</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">86%</span>
                                </div>
                            </li>
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/vue-logo.png" alt="vue-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">VueJs</h6>
                                        <small class="text-muted">Calendar App</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">90%</span>
                                </div>
                            </li>
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/react-logo.png" alt="react-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">React</h6>
                                        <small class="text-muted">Dashboard</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">37%</span>
                                </div>
                            </li>
                            <li class="mb-3 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/bootstrap-logo.png" alt="bootstrap-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">Bootstrap</h6>
                                        <small class="text-muted">Website</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">22%</span>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="../../assets/img/icons/brands/sketch-logo.png" alt="sketch-logo" class="me-3" width="35" />
                                    <div>
                                        <h6 class="mb-0">Sketch</h6>
                                        <small class="text-muted">Website Design</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3" style="height: 8px">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">29%</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/Active Project -->
        </div>
    </div>
</div>
@endsection