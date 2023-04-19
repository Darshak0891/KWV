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
        <!-- <div class="card">
            <h5 class="card-header">ADD SOCIETY</h5>
            <div class="card-body">
                <form method="post" action="{{ route('societies.store') }}" id="addsocietyForm">
                    <div class="form-group">
                        @csrf
                        <label for="society_name">Society Name</label>
                        <input type="text" id="society_name" class="form-control" name="society_name"
                            placeholder="ex. society 1" />
                    </div><br><br>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ADD SOCIETY</button>
                </form>
            </div>
        </div> -->
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Society /</span> Society List</h4>

        <div class="card">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @endif
            <br>
            <div class="input-group">
                <div class="form-outline">
                    <form action="{{ route('societies.index') }}" role="search" method="GET">
                        <input type="search" name="search" class="form-control" placeholder="Search..." />
                    </form>
                </div>
            </div><br>
            <div class="row" align="right">
                <div class="col-12">
                    <a class="btn btn-primary me-sm-3 me-1 data-submit float-right"
                        href="{{ route('societies.create') }}">Add Society</a>
                    <a class="btn btn-primary me-sm-3 me-1 data-submit float-right"
                        href="{{ route('societies.fileImportExport') }}">Import Society</a>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <caption class="ms-4">
                        List of Societies
                    </caption>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Society Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($society as $key => $societies)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$societies->society_name}}</td>
                            <td class="text-center">
                                <a href="{{ route('societies.edit', $societies->id)}}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('societies.delete', $societies->id)}}" method="post"
                                    style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to remove this society?')"
                                        type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $society->links() }}
            </div>
        </div>
    </div>
    <script>
    if ($("#addsocietyForm").length > 0) {
        $("#addsocietyForm").validate({
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