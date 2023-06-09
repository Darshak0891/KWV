<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-starter">

<head>
    <meta charset="utf-8" />
    @if(auth()->user()->is_admin == 1)
    <title>Admin Dashboard</title>
    @else
    <title>Employee Dashboard</title>
    @endif

    <!-- <meta name="description" content="" /> -->
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/kwv.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="/assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>

    <!--    -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>


    <style>
    label.error {
        color: #dc3545;
        font-size: 14px;
    }
    </style>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="#" class="app-brand-link">
                        <img src="{{url('/image/kwv.jpg')}}" alt="Image" width="100" height="70" />
                        <span class="app-brand-text demo menu-text fw-bold">KWV</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Page -->
                    @if(auth()->user()->is_admin == 1)
                    <li class="menu-item {{ Request::routeIs(['admin.dashboard']) ? 'active' : '' }}">
                        <a href="{{ url('admin/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="DASHBOARD">DASHBOARD</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::routeIs(['employees.index', 'employees.create', 'employees.edit']) ? 'active' : '' }}">
                        <a href="{{ url('employees') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="EMPLOYEE">EMPLOYEE</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::routeIs(['societies.index', 'societies.create', 'societies.edit', 'societies.fileImportExport']) ? 'active' : '' }}">
                        <a href="{{ url('societies') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-building"></i>
                            <div data-i18n="SOCIETY">SOCIETY</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::routeIs(['houses.index', 'houses.create', 'houses.edit', 'houses.fileImportExport']) ? 'active' : '' }}">
                        <a href="{{ url('houses') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-home"></i>
                            <div data-i18n="HOUSE">HOUSE</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::routeIs(['employee_houses.index', 'employee_houses.create', 'employee_houses.show', 'employee_houses.show_house']) ? 'active' : '' }}">
                        <a href="{{ url('employee_houses') }}" class="menu-link">
                            <!-- <i class="menu-icon tf-icons ti ti-building-user"></i> -->
                            <i class="fa-solid fa-building-user"></i>&nbsp;
                            <div data-i18n="EMPLOYEE & HOUSE">EMPLOYEE & HOUSE</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs(['adminlogs.index', 'adminlogs.show']) ? 'active' : '' }}">
                        <a href="{{ route('adminlogs.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-id"></i>
                            <div data-i18n="LOGS">LOGS</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::routeIs(['reports.index']) ? 'active' : '' }}">
                        <a href="{{ route('reports.index') }}" class="menu-link">
                            <i class="ti-xs ti ti-file-description me-1"></i>
                            <div data-i18n="REPORT">REPORT</div>
                        </a>
                    </li>
                    @else
                    <li class="menu-item {{ Request::routeIs(['user.dashboard']) ? 'active' : '' }}">
                        <a href="{{ url('user/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-smart-home"></i>
                            <div data-i18n="DASHBOARD">DASHBOARD</div>
                        </a>
                    </li>
                    <li
                        class="menu-item {{ Request::routeIs(['allocatesocieties.index', 'allocatesocieties.show', 'allocatesocieties.actions']) ? 'active' : '' }}">
                        <a href="{{ route('allocatesocieties.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons ti ti-building"></i>
                            <div data-i18n="ALLOCATED SOCIETY">ALLOCATED SOCIETY</div>
                        </a>
                    </li>
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="ti ti-menu-2 ti-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <h5>KHODIYAR WORLD VISION</h5>
                        <div class="navbar-nav align-items-center">
                            <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                <i class="ti ti-sm"></i>
                            </a>
                        </div>

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="/assets/img/avatars/1.png" alt
                                                            class="h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profiles.index') }}">
                                            <i class="ti ti-user-check me-2 ti-sm"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    @if(auth()->user()->is_admin == 1)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('notifications.index') }}">
                                            <i class="ti ti-bell ti-md"></i>
                                            <span class="align-middle">Notificaitons</span>
                                        </a>
                                    </li>
                                    @endif

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="ti ti-logout me-2 ti-sm"></i>{{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl">
                            <div
                                class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                <div>
                                    ©
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script>
                                    , made with ❤️ by <a href="http://thewebtime.in/" target="_blank"
                                        class="fw-semibold">WEB-TIME</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="/assets/vendor/libs/hammer/hammer.js"></script>

    <script src="/assets/vendor/libs/i18n/i18n.js"></script>
    <script src="/assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/moment/moment.js"></script>
    <script src="/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/app-user-list.js"></script>
    <!-- Page JS -->
    <script src="../../assets/js/dashboards-crm.js"></script>
</body>

</html>