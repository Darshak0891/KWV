@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('reports.index') }}" action="get">
                @csrf
                @php
                

                $currentDate = date('Y-m-d');
                $currentDate = date('Y-m-d', strtotime($currentDate));
                $contractDateBegin = date('Y-m-d', strtotime("01/" . date('m') . "/" . date('y')));
                $contractDateEnd = date('Y-m-d', strtotime("08/" . date('m') . "/" . date('y')));
                //dd($contractDateBegin, $contractDateEnd);
                if (($currentDate >= $contractDateBegin) && ($currentDate <= $contractDateEnd)) { 
                    $year = date('Y');
                    $month = date('m');
                    if($month == 1 ){
                        $month = 12;
                        $year = $year - 1;
                    } else{
                        $month = $month - 01;
                    }
                    $date_year = $year.'-'.sprintf("%02d", $month);
                    
                } 
                else { 
                    $date_year = date('Y-m');
                    }

                @endphp

                    <input type="month" name="month" value="{{ (request()->input('month')) ? request()->input('month') : '' }}" max="{{$date_year}}" />

                    <!-- TO
                <input type="date" name="to" value="{{ (request()->input('to')) ? request()->input('to') : '' }}" /> -->

                    <select name="report">
                        <option value="">All</option>
                        @foreach($user as $users)
                        <option value="{{ $users->id }}" {{ (request()->input('report') == $users->id) ? 'selected' : '' }}>
                            {{$users->name}}
                        </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Submit</button>

            </form>
            <a class="btn btn-warning" href="{{ route('reports.export') }}">Export User Data</a>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>House No.</th>
                            <!-- <th>Name</th> -->
                            <th>Society</th>
                            <!-- <th>Mobile Number</th> -->
                            <th>Box Number</th>
                            <th>Baki</th>
                            <th>Rent</th>
                            <th>Jama</th>
                            <!-- <th>Date</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($report as $key => $data)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $data->house_no }}</td>
                            <!-- <td>{{ $data->name }}</td> -->
                            <td>{{ $data->society_name }}</td>
                            <!-- <td>{{ $data->mobile_no }}</td> -->
                            <td>{{ $data->box_no }}</td>
                            <td>{{ $data->baki }}</td>
                            <td>{{ $data->rent }}</td>
                            <td>{{ $data->jama }}</td>
                            <!-- <td>{{ $data->date }}</td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script>
    datePickerId.max = new Date().getMonth().toString();
</script>
</div>

@endsection