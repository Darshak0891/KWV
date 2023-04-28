@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('allocatesocieties.index') }}" class="text-muted fw-light">Allocated
            Society</a> / House List</h4>
    <div class="card">
        <div class="card-body">
            <h5 class="card-header">Allocated House List</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>House No.</td>
                            <td>Mobile No.</td>
                            <td>Box No.</td>
                            <td>Baki</td>
                            <td>Rent</td>
                            <td>Jama</td>
                            <!-- <td>Action</td> -->
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($show_house as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->house_no }}</td>
                            <td>{{ $data->mobile_no }}</td>
                            <td>{{ $data->box_no }}</td>
                            <td>{{ $data->baki }}</td>
                            <td>{{ $data->rent }}</td>
                            <td>
                                <form method="post" id="action"
                                    action="{{ route('allocatesocieties.actionpost', $data->hId) }}">
                                    @csrf
                                    @method('POST')

                                    <input type="text" name="jama" value="{{ $data->jama }}" size="3" />
                                    <input type="text" name="remark" value="{{ $data->remark }}" size="7" />

                                    <input type="hidden" name="actionid" value="{{ $data->hId }}">
                                    <button type="submit">Submit</button>
                                </form>
                            </td>
                            <!-- <td></td> -->
                            @if($data->baki == 0)
                            <td><button class="btn btn-success" disabled>Completed</button></td>
                            @else
                            <td> <a class="btn btn-primary"
                                    href="{{ route('allocatesocieties.actions', $data->hId) }}">Action</a> </td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection