<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($examAttendances->count() > 0)
    
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Exam attendance report</b></h6>
    </div>
    
        <table id="dataTableExample1" class="table table-bordered mb-2">
            
            <thead>
                <tr class="text-center">
                    <th>Student</th>
                    <th>Admission No</th>
                    <th>Role No</th>
                    <th>Date</th>
                    <th>Year</th>
                    <th>Subject</th>
                    <th>Code</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($examAttendances as $examAttendance)
                    
                    <tr  class="text-center">
                        <td>{{ $examAttendance->student->first_name.' '.$examAttendance->student->last_name }}</td>            
                        <td>{{ $examAttendance->student->admission_no }}</td>            
                        <td>{{ $examAttendance->student->roll_no }}</td>            
                        <td>{{ $examAttendance->date }}</td>            
                        <td>{{ $examAttendance->year }}</td>            
                        <td>{{ $examAttendance->subject->name }}</td>            
                        <td>{{ $examAttendance->subject->code }}</td> 
                        @if ($examAttendance->attendance_status == 'present')
                           <td><span class="badge badge-success">Present</span></td> 
                        @else
                            <td><span class="badge badge-danger">Absent</span></td> 
                        @endif           
                    </tr>

                @endforeach

            </tbody>
        </table>
        
@else
    <span class="alert alert-danger d-block mt-3">There is no data available in this credential</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>