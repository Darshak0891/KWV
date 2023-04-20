@extends('layouts.app')
@section('content')
<!doctype html>
<html lang="en">

<head>

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
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <a href="{{ route('employees.index') }}" class="text-muted fw-light">Employee </a>/ Update
            Employee
        </h4>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('employees.update', $employee->id) }}" id="regForm">
                        <div class="mb-3">
                            @csrf
                            @method('POST')
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $employee->name }}"
                                required="" />
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email"
                                value="{{ $employee->email }}" required="" />
                        </div>
                        <!-- <div class="mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" name="password" value="{{ $employee->password }}"/>
          </div> -->
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" class="form-control" name="phone"
                                value="{{ $employee->phone }}" required="" />
                        </div><br>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    if ($("#regForm").length > 0) {
        $("#regForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 20
                },
                email: {
                    required: true,
                    maxlength: 50
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
            },
            messages: {
                name: {
                    required: "Name is required",
                    maxlength: "Name cannot be more than 20 characters"
                },
                email: {
                    required: "Email is required",
                    email: "Email must be a valid email address",
                    maxlength: "Email cannot be more than 50 characters",
                },
                phone: {
                    required: "Phone number is required",
                    minlength: "Phone number must be of 10 digits"
                },
            },
        })
    }
    </script>
</body>

</html>
@endsection