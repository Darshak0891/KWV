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
        <h4 class="fw-bold py-3 mb-4"><a href="{{ route('societies.index') }}" class="text-muted fw-light">Society</a> /
            Edit Society</h4>
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
                    <form method="post" id="updatesociety" action="{{ route('societies.update', $society->id) }}">
                        <div class="mb-3">
                            @csrf
                            @method('POST')
                            <label for="society_name">Society Name</label>
                            <input type="text" id="society_name" class="form-control" name="society_name"
                                value="{{ $society->society_name }}" />
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Society</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    if ($("#updatesociety").length > 0) {
        $("#updatesociety").validate({
            rules: {
                society_name: {
                    required: true,
                    maxlength: 20
                },
            },
            messages: {
                society_name: {
                    required: "Name is required",
                    maxlength: "Name cannot be more than 20 characters"
                },
            },
        })
    }
    </script>
</body>

</html>
@endsection