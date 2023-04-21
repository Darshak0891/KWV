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
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('houses.index') }}" class="text-muted fw-light">House</a> / Edit
            House</h4>
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
                    <form method="post" action="{{ route('houses.update', $house->id) }}" id="hsForm">
                        <div class="mb-3">
                            @csrf
                            @method('POST')
                            <label for="house_no">House No.</label>
                            <input type="text" id="house_no" class="form-control" name="house_no"
                                value="{{ $house->house_no }}" required="" />
                        </div>
                        <label for="society">Society Name</label>
                        <select name="society_id" class="form-control">
                            <option value="">Select Society</option>
                            @foreach($society as $data)
                            <option value="{{$data->id}}" {{$data->id == $house->society_id ? 'selected' : '' }}>
                                {{ $data->society_name }}
                            </option>
                            @endforeach
                        </select>
                        <br>
                        <div class="mb-3">
                            <label for="mobile_no">Mobile No.</label>
                            <input type="text" id="mobile_no" class="form-control" name="mobile_no"
                                value="{{ $house->mobile_no }}" required="" />
                        </div>
                        <div class="mb-3">
                            <label for="box_no">Box No.</label>
                            <input type="text" id="box_no" class="form-control" name="box_no"
                                value="{{ $house->box_no }}" required="" />
                        </div>
                        <div class="mb-3">
                            <label for="rent">Rent</label>
                            <input type="text" id="rent" class="form-control" name="rent" value="{{ $house->rent }}"
                                required="" />
                        </div>
                        <div class="form-group" id="result">
                            DC:
                            <input type="radio" name="dc" value="1" {{ ($house->dc=="1") ? "checked" : "" }} required=""
                                class="form-check-input">Yes
                            <input type="radio" name="dc" value="0" {{ ($house->dc=="0") ? "checked" : "" }} required=""
                                class="form-check-input">No
                        </div><br>
                        <div class="form-group" id="result">
                            NOD:
                            <input type="radio" name="nod" value="1" {{ ($house->nod=="1") ? "checked" : "" }}
                                required="" class="form-check-input">Yes
                            <input type="radio" name="nod" value="0" {{ ($house->nod=="0") ? "checked" : "" }}
                                required="" class="form-check-input">No
                        </div><br>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update House</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    if ($("#hsForm").length > 0) {
        $("#hsForm").validate({
            rules: {
                house_no: {
                    required: true,
                    maxlength: 20
                },
                mobile_no: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
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
                    minlength: "Phone number must be of 10 digits",
                    maxlength: "Phone number must be of 10 digits"
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
                name: {
                    required: "Name is required",
                    number: "Please enter a number"
                },
            },
        })
    }
    </script>
</body>

</html>
@endsection