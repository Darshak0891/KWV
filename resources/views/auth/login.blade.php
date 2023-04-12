<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>KWV</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
  <link rel="stylesheet" href="../../assets/vendor/fonts/tabler-icons.css" />
  <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../../assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
  <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
  <!-- Vendor -->
  <link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="../../assets/vendor/js/template-customizer.js"></script>
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../../assets/js/config.js"></script>
</head>

<body>

  <!-- <div class="authentication-wrapper authentication-cover authentication-bg">
      <div class="authentication-inner row"> -->
  <div align="center">

    <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <h3 class="mb-1 fw-bold">Welcome to KWV! 👋</h3>
        <p class="mb-4">Please sign-in to your account and start the adventure</p>
        @if (\Session::has('error'))
        <div class="alert alert-danger">
          <ul>
            <li>{!! \Session::get('error') !!}</li>
          </ul>
        </div>
        @endif
        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email or Username</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email or username" required autocomplete="email" autofocus />
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <!-- @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror -->
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="password">Password</label>

            </div>
            <div class="input-group input-group-merge">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required autocomplete="current-password" />
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <!-- @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror -->

              <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100">Sign in</button>
        </form>

      </div>
    </div>
  </div>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  <script src="../../assets/vendor/js/bootstrap.js"></script>
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>

  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

  <script src="../../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
  <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
  <script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/pages-auth.js"></script>
</body>

</html>