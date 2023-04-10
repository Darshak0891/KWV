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
    <div class="card">
    <div class="card-body">
    <form method="post" action="{{ route('employee_houses.store') }}" id="regForm" autocomplete="off">
        @csrf
        <div class="mb-3">
        <label>Select Employee</label>
        <select name="user_id" class="form-control" required="">     
            <option value="">Select Employee</option>
                @foreach($employee_name as $data)
                    <option value="{{$data->id}}">{{ $data->name }}</option>
                @endforeach
        </select>
        </div>

        <div class="mb-3">
        <label>Select Society</label>
        <select name="society_id" id="society_id" class="form-control" required="">     
            <option value="">Select Society</option>
                @foreach($employee_society as $data)
                    <option value="{{$data->id}}">{{ $data->society_name }}</option>
                @endforeach
        </select>
        </div>
        
        <div  class="mb-3">
            <label >Select House</label>
            <select id="house" name="house_id" class="form-control">
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </div>
</div>
<script>
    console.log(111)
    $(document).ready(function () {
            $('#society_id').on('change', function () {
                console.log(111)
                var idSociety = this.value;
                $("#house").html('');
                $.ajax({
                    url: "{{route('employee_houses.fetchhouse')}}",
                    type: "POST",
                    data: {
                        society_id: idSociety,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#house').html('<option value="">Select Houses</option>');
                        $.each(result.houses, function (key, value) {
                            $("#house").append('<option value="' + value
                                .id + '">' + value.house_no + '</option>');
                        });
                       // $('#city-dd').html('<option value="">Select City</option>');
                    }
                });
            });
        });
</script>
@endsection