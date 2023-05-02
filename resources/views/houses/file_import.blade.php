@extends('layouts.app')
@section('content')
@if($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('houses.index') }}" class="text-muted fw-light">House</a> / Import
        House</h4>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <form action="{{ route('houses.file_import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                        <div class="custom-file text-left">
                            <input type="file" name="file" class="custom-file-input" id="customFile">
                        </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection