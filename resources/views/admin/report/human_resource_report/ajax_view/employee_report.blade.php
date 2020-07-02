<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 13px;
    }
</style>
@if ($emp_reports->count() > 0)
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Student report</b></h6>
    </div>
    
    <table id="dataTableExample1" class="table table-bordered mb-2">
        
        <thead>
            <tr class="text-center">
                <th colspan="1">Name</th>
                <th>Employee ID</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Role</th>
                <th>Designation</th>
                <th>Date Of Birth</th>
                <th>Gender</th>
                <th>Religion</th>
                <th>Qualification</th>
                <th>Basic Salary</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($emp_reports as $emp_report)
                
                <tr  class="text-center">
                    <td> {{ $emp_report->adminname}}</td>
                    <td>{{ $emp_report->employee_id }}</td>
                    <td>{{ $emp_report->phone }}</td>
                    <td>{{ $emp_report->email }}</td>
                    @if ($emp_report->role == 1)
                        <td>Super Admin</td>
                    @elseif($emp_report->role == 2)
                        <td>Admin</td>
                    @elseif($emp_report->role == 3)
                        <td>Teacher</td>
                    @elseif($emp_report->role == 4)
                        <td>Accountant</td>
                    @elseif($emp_report->role == 5)
                        <td>Librarian</td>
                    @elseif($emp_report->role == 6)
                        <td>Driver</td>
                    @elseif($emp_report->role == 7)
                        <td>Clerk</td>
                    @elseif($emp_report->role == 8)
                        <td>Security Guard</td>
                    @endif
                    <td>{{ $emp_report->designation }}</td>
                    <td>{{ $emp_report->date_of_birth }}</td>                           
                    <td>{{ $emp_report->gender }}</td>                           
                    <td>{{ $emp_report->religion }}</td>                           
                    <td>{{ $emp_report->qualification }}</td>                           
                    <td>{{ $emp_report->basic_salary }}</td>                           
                </tr>

            @endforeach

        </tbody>
    </table>   
@else
    <span class="alert alert-danger d-block">There is no employee in this credential.</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>