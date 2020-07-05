<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($guardian_reports->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Guardian report</b></h6>
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th colspan="1">Student</th>
                        <th>Admission No</th>
                        <th>Father Name</th>
                        <th>Father Phone</th>
                        <th>Mother Name</th>
                        <th>Mother Phone</th>
                        <th>Guardian Name</th>
                        <th>Guardian Relation</th>
                        <th>Guardian phone</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($guardian_reports as $student)
                        
                        <tr  class="text-center">
                            <td> {{ $student->first_name.' '.$student->last_name }}</td>
                            <td>{{ $student->admission_no }}</td>
                            <td>{{ $student->father_name }}</td>  
                            <td>{{ $student->father_phone }}</td>  
                            <td>{{ $student->mother_name }}</td>  
                            <td>{{ $student->mother_phone }}</td>  
                            <td>{{ $student->guardian_name }}</td>
                            <td>{{ $student->guardian_relation }}</td>
                            <td>{{ $student->guardian_phone }}</td>                           
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block">There is no student in this class section</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>