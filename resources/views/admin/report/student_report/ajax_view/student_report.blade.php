<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($student_reports->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Student report</b></h6>
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th colspan="1">Student</th>
                        <th>Admission No</th>
                        <th>Roll</th>
                        <th>Category</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Mobile No</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($student_reports as $student)
                        
                        <tr  class="text-center">
                            <td> {{ $student->first_name.' '.$student->last_name }}</td>
                            <td>{{ $student->admission_no }}</td>
                            <td>{{ $student->roll_no }}</td>
                            <td>{{ $student->Category->name }}</td>
                            <td>{{ $student->date_of_birth }}</td>
                            <td>{{ $student->Gender->name }}</td>                           
                            <td>{{ $student->student_mobile }}</td>                           
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block">There is no student in this credential.</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>