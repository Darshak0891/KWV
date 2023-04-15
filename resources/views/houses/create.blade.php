@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">House /</span> Add House</h4>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('houses.store') }}" id="houseForm" autocomplete="off">
                    <div class="mb-3">
                        @csrf
                        <label for="house_no">House No.</label>
                        <input type="text" id="house_no" class="form-control" name="house_no" placeholder="ex. A-101" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="society">Society</label>
                        <select name="society_id" class="form-control" required="">
                            <option value="">Select Society</option>
                            @foreach($society as $data)
                            <option value="{{$data->id}}">{{ $data->society_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mobile_no">Mobile Number</label>
                        <input type="text" id="mobile_no" class="form-control" name="mobile_no" placeholder="ex. +91 1234567890" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="box_no">Box Number</label>
                        <input type="text" id="box_no" class="form-control" name="box_no" placeholder="ex. 123456" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="rent">Rent</label>
                        <input type="text" id="rent" class="form-control" name="rent" placeholder="ex. 350" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="credit">Credit</label>
                        <input type="text" id="credit" class="form-control" name="credit" placeholder="0" required="" />
                    </div>
                    <div class="mb-3">
                        <label for="debit">Debit</label>
                        <input type="text" id="debit" class="form-control" name="debit" placeholder="0" required="" />
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add House</button>
                </form>
            </div>
        </div>
        <script>
            if ($("#houseForm").length > 0) {
                $("#houseForm").validate({
                    rules: {
                        house_no: {
                            required: true,
                            maxlength: 20
                        },
                        mobile_no: {
                            required: true,
                            minlength: 10,
                            maxlength: 10
                        },
                        box_no: {
                            required: true,
                            number: true
                        },
                        rent: {
                            required: true,
                            number: true
                        },
                        credit: {
                            required: true,
                            number: true
                        },
                        debit: {
                            required: true,
                            number: true
                        },

                    },
                    messages: {
                        house_no: {
                            required: "House Number is required",
                        },
                        mobile_no: {
                            required: "Mobile Number is required",
                            minlength: "Mobile Number is atleast 10 digits required",
                            maxlength: "Mobile Number is atleast 10 digits required"
                        },
                        box_no: {
                            required: "Box Number is required",
                            number: "Please enter a valid box number"
                        },
                        rent: {
                            required: "Rent is required",
                            number: "Please enter a number"
                        },
                        credit: {
                            required: "Credit is required",
                            number: "Please enter a number"
                        },
                        debit: {
                            required: "Debit is required",
                            number: "Please enter a number"
                        },

                    },
                })
            }
        </script>
        @endsection