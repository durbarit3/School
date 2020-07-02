<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 13px;
    }
</style>
@if ($leaveApplyReports->count() > 0)
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Student report</b></h6>
    </div>
    
    <table id="dataTableExample1" class="table table-bordered mb-2">
        
        <thead>
            <tr class="text-center">
                <th colspan="1">Name</th>
                <th>Employee ID</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Designation</th>
                <th>Leave Type</th>
                <th>Leave</th>
                <th>Days</th>
                <th>Apply Date</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach($leaveApplyReports as $leaveApplyReport)
                
                <tr  class="text-center">
                    <td> {{ $leaveApplyReport->employee->adminname }}</td>
                    <td>{{ $leaveApplyReport->employee->employee_id }}</td>
                    <td>{{ $leaveApplyReport->employee->phone }}</td>
                    @if ($leaveApplyReport->employee->role == 1)
                        <td>Super Admin</td>
                    @elseif($leaveApplyReport->employee->role == 2)
                        <td>Admin</td>
                    @elseif($leaveApplyReport->employee->role == 3)
                        <td>Teacher</td>
                    @elseif($leaveApplyReport->employee->role == 4)
                        <td>Accountant</td>
                    @elseif($leaveApplyReport->employee->role == 5)
                        <td>Librarian</td>
                    @elseif($leaveApplyReport->employee->role == 6)
                        <td>Driver</td>
                    @elseif($leaveApplyReport->employee->role == 7)
                        <td>Clerk</td>
                    @elseif($leaveApplyReport->employee->role == 8)
                        <td>Security Guard</td>
                    @endif
                    <td>{{ $leaveApplyReport->employee->designation }}</td>
                    <td>{{ $leaveApplyReport->leaveType->name  }}</td>                           
                    <td>{{ $leaveApplyReport->start_date }} <b> - To -</b> {{ $leaveApplyReport->end_date }} </td>   
                    @php
                        $start_date = date_create($leaveApplyReport->start_date);
                        $end_date = date_create($leaveApplyReport->end_date);

                        //difference between two dates
                        $diff = date_diff($start_date,$end_date);

                        //count days
                        $day_count =  $diff->format("%a");
                    @endphp                     
                    <td>{{ $day_count + 1 }}</td>                           
                    <td>{{ $leaveApplyReport->apply_date }}</td>                        
                                             
                </tr>

            @endforeach

        </tbody>
    </table>   
@else
    <span class="alert alert-danger d-block">There is no applied leave in this credential.</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>