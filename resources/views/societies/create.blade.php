@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Society /</span> Add Society</h4>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('societies.store') }}" id="addsocietyForm">
                <div class="form-group">
                    @csrf
                    <label for="society_name">Society Name</label>
                    <input type="text" id="society_name" class="form-control" name="society_name" placeholder="ex. society 1" />
                </div><br><br>
                <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ADD SOCIETY</button>
            </form>
        </div>
    </div>
</div>
@endsection