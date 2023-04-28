@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><a href="{{ route('allocatesocieties.index') }}" class="text-muted fw-light">Allocated
            Society</a> / House List</h4>
    <div class="card">
        <div class="input-group">
            <div class="form-outline">
                <form action="{{ route('allocatesocieties.show', $id) }}" role="search" method="GET">
                    <input type="search" name="search" class="form-control" placeholder="Search..." />
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>House No.</th>
                                <th>Mobile No.</th>
                                <th>Box No.</th>
                                <th>Baki</th>
                                <th>Rent</th>
                                <th>Jama</th>
                                <th>Status</th>
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
                                    <form method="post" id="action" action="{{ route('allocatesocieties.actionpost', $data->hId) }}">
                                        @csrf
                                        @method('POST')

                                        <input type="text" name="jama" value="{{ $data->jama }}" size="3" />
                                        <input type="text" name="remark" value="{{ $data->remark }}" size="9" placeholder="Note" />

                                        <input type="hidden" name="actionid" value="{{ $data->hId }}">
                                        <button type="submit">Submit</button>
                                    </form>
                                </td>
                                <!-- <td></td> -->
                                @if($data->baki == 0)
                                <td><button class="btn btn-success" disabled>Completed</button></td>
                                @else
                                <td> <button class="btn btn-warning" disabled>Pending</button></td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection