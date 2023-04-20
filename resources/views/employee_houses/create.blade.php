@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('employee_houses.index') }}" class="text-muted fw-light">Employee &
            House</a> / Allocate Society</h4>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('employee_houses.store') }}" id="regForm" autocomplete="off">
                @csrf


                <div class="mb-3">
                    <label>Select Employee</label>
                    <select name="user_id" id="user_id" class="form-control" required="">
                        <option value="">Select Employee</option>
                        @foreach($employee_name as $data)
                        <option value="{{$data->id}}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Select Society</label>
                    <select id="society" name="society_id" class="form-control">
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#user_id').on('change', function() {
        //  console.log(111)
        var idUser = this.value;
        $("#house").html('');
        $.ajax({
            url: "{{route('employee_houses.fetchsociety')}}",
            type: "POST",
            data: {
                user_id: idUser,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#society').html('<option value="">Select Society</option>');
                $.each(result.societies, function(key, value) {
                    $("#society").append('<option value="' + value
                        .id + '">' + value.society_name + '</option>');
                });
            }
        });
    });

});
</script>

@endsection