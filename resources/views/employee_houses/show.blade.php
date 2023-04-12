@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="table responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <td>Society Name</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($show as $data)
                    <tr>
                        <td>{{$data->society_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection