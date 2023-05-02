@extends('layouts.app')
@section('content')

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
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('allocatesocieties.index') }}" class="text-muted fw-light">Allocated
            Society</a> / Rent Department</h4>
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
                <form method="post" id="action" action="{{ route('allocatesocieties.actionpost') }}">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="rent">Rent</label>
                        <input type="text" id="rent" class="form-control" name="rent" value="{{ $action->rent }}"
                            disabled />
                    </div>
                    <div class="mb-3">
                        <label for="baki">Baki</label>
                        <input type="text" id="baki" class="form-control" name="baki" value="{{ $action->baki }}"
                            disabled />
                    </div>
                    <div class="mb-3">
                        <label for="jama">Jama</label>
                        <input type="text" id="jama" class="form-control" name="jama" />
                    </div>
                    <div class="mb-3">
                        <label for="remark">Remark</label>
                        <textarea id="remark" class="form-control" name="remark"
                            value="{{ $action->remark }}"></textarea>
                    </div>
                    <input type="hidden" name="actionid" value="{{ $action->id }}">
                    <br>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
if ($("#action").length > 0) {
    $("#action").validate({
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
@endsection