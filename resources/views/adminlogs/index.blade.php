@extends('layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="table responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>USER ID</th>
                            <th>TYPE</th>
                            <th>ACTION TYPE</th>
                            <!-- <th>REQUEST</th> -->
                            <th>MESSAGE</th>
                            <th>Action</th>
                            <!-- <th>OLD DATA</th> -->
                            <!-- <th>NEW DATA</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($admin_log as $key => $admin_logs)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $admin_logs->name }}</td>
                        
                            @if($admin_logs->type_id == 1)         
                                <td>Employee</td>         
                            @elseif($admin_logs->type_id == 2)
                                <td>Society</td>
                            @else
                                <td>House</td>        
                            @endif 
                        
                        
                            @if($admin_logs->action_type_id == 1)         
                                <td>create</td>         
                            @elseif($admin_logs->action_type_id == 2)
                                <td>update</td>
                            @else
                                <td>delete</td>        
                             @endif 
                        
                        <!-- <td>{{ $admin_logs->request_id }}</td> -->
                        <td>{{ $admin_logs->message }}</td>
                        @if($admin_logs->action_type_id == 2)
                        <td><a class="btn btn-primary" href="{{ route('adminlogs.show', $admin_logs->id)}}">Show Updated Data</a></td>
                        @else
                        <td>-</td>
                        @endif
                       <!--  <td>{{ $admin_logs->edit_old_data }}</td>
                        <td>{{ $admin_logs->edit_new_data }}</td> -->
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection