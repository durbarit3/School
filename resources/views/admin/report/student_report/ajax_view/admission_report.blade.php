<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($admission_reports->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Admission report</b></h6>
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        
                        <th>Admission No</th>
                        <th colspan="1">Student</th>
                        <th>Class</th>
                        <th>Father Name</th>
                        <th>Date Of Birth</th>
                        <th>Admission Date</th>
                        <th>Gender</th>
                        <th>Category</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($admission_reports as $student)
                        
                        <tr  class="text-center">
                            <td>{{ $student->admission_no }}</td>
                            <td> {{ $student->first_name.' '.$student->last_name }}</td>
                            <td>{{ $student->Class->name }} ({{ $student->Section->name }})</td>
                            <td>{{ $student->father_name }}</td>
                            <td>{{ $student->date_of_birth }}</td>
                            <td>{{ $student->admission_date }}</td>                           
                            <td>{{ $student->Gender->name }}</td>                           
                            <td>{{ $student->Category->name }}</td>                           
                            <td>{{ $student->student_mobile }}</td>                           
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block mt-3">There is no data available in this credential</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>