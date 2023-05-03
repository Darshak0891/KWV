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
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}"
                class="text-muted fw-light">Employee &
                House</a> / House List</h4>
        <!-- Users List Table -->
        <style>
        .search {
            margin: 30px;
            margin-top: 5px;
            color: green;
        }

        .page {
            margin-bottom: 5px;
            margin-left: 400px;
        }
        </style>
        <div class="card">
            <br>
            <div class="input-group">
                <div class="search">
                    <form action="{{ route('employee_houses.show_house', $id) }}" role="search" method="GET">
                        <input type="search" name="search" class="form-control" placeholder="Search..." /><br>

                        <select name="system" id="system1">
                            <option value="all" {{ (request()->input('system') == 'all') ? 'selected' : '' }}>ALL
                            </option>
                            <option value="dc" {{ (request()->input('system') == 'dc') ? 'selected' : '' }}>DC
                            </option>
                            <option value="nod" {{ (request()->input('system') == 'nod') ? 'selected' : '' }}>NOD
                            </option>
                        </select>

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="row" align="right">
                <div class="col-12">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>House No.</th>
                                    <th>Name</th>
                                    <th>Mobile No.</th>
                                    <th>Box No.</th>
                                    <th>Baki</th>
                                    <th>Rent</th>
                                    <th>Jama</th>
                                    <th>Note</th>
                                    <th>DC</th>
                                    <th>NOD</th>
                                    <th>Submit</th>
                                    <th>Status</th>
                                </tr>
                            <tbody>
                                @foreach($show_house as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>

                                        <form method="post"
                                            action="{{ route('employee_houses.actionpost', $data->id) }}"
                                            id="emphsForm">
                                            @csrf
                                            @method('POST')

                                            <input type="text" id="house_no" name="house_no"
                                                value="{{ $data->house_no }}" size="5" />

                                    <td> <input type="text" id="name" name="name" value="{{ $data->name }}" size="25" />
                                    </td>
                                    <td> <input type="text" id="mobile_no" name="mobile_no"
                                            value="{{ $data->mobile_no }}" size="10" />
                                    </td>
                                    <td> <input type="text" id="box_no" name="box_no" value="{{ $data->box_no }}"
                                            size="15" /></td>

                                    <td> <input type="text" id="baki" name="baki" value="{{ $data->baki }}" size="3" />
                                    </td>

                                    <td> <input type="text" id="rent" name="rent" value="{{ $data->rent }}" size="3" />
                                    </td>

                                    <td> <input type="text" id="jama" name="jama" value="{{ $data->jama }}" size="3" />
                                    </td>

                                    <td><input type="text" name="remark" value="{{ $data->remark }}" placeholder="Note"
                                            size="9" /></td>

                                    <td> <input type="radio" name="dc" value="1" {{ ($data->dc=="1") ? "checked" : "" }}
                                            required="" class="form-check-input">Yes
                                        <input type="radio" name="dc" value="0" {{ ($data->dc=="0") ? "checked" : "" }}
                                            required="" class="form-check-input">No
                                    </td>

                                    <td> <input type="radio" name="nod" value="1"
                                            {{ ($data->nod=="1") ? "checked" : "" }} required=""
                                            class="form-check-input">Yes
                                        <input type="radio" name="nod" value="0"
                                            {{ ($data->nod=="0") ? "checked" : "" }} required=""
                                            class="form-check-input">No
                                    </td>

                                    <input type="hidden" name="actionid" value="{{ $data->hId }}">

                                    <td> <button type="submit" class="btn-default">Submit</button></td>
                                    </form>
                                    </td>
                                    @if($data->baki == 0)
                                    <td><button class="btn btn-success" disabled>Completed</button></td>
                                    @else
                                    <td> <button class="btn btn-warning" disabled>Pending</button> </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    if ($("#emphsForm").length > 0) {
        $("#emphsForm").validate({
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
                },
                rent: {
                    required: true,
                    number: true
                },
                baki: {
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
                },
                rent: {
                    required: "Rent is required",
                    number: "Please enter a number"
                },
                baki: {
                    required: "Baki is required",
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