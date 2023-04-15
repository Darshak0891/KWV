@extends('layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Employee /</span> Add Employee</h4>
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
                <form method="post" action="{{ route('employees.store') }}" id="regForm" autocomplete="off">
                    <div class="mb-3">
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="ex. Rahul" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="ex. rahul@example.com" required="" />
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="*****" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="+91-1234567890" required="" />
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add Employee</button>
                </form>
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
                            maxlength: 50,
                            unique: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        phone: {
                            required: true,
                            minlength: 10,
                            maxlength: 10,
                            number: true,
                            unique: true
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
                            unique: "This email id is already taken."
                        },
                        password: {
                            required: "Password is required",
                            minlength: "Password must be at least 8 characters"
                        },
                        phone: {
                            required: "Phone number is required",
                            minlength: "Phone number must be of 10 digits",
                            unique: "This phone no is already taken."
                        },
                    },
                })
            }
        </script>
        @endsection