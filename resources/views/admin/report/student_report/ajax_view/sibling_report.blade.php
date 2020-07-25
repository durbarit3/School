@if ($student_siblings->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Student subling report</b></h6>
        </div>
       
            <table id="dataTableExample1" class="table table-striped table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th>Father</th>
                        <th>Mother</th>
                        <th>Guardian</th>
                        <th>Guardian phone</th>
                        <th>Student name(Sibling)</th>
                        <th>Class</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($student_siblings as $student_sibling)
                        
                        <tr  class="text-center">
                            <td> {{ $student_sibling->father_name }}</td>
                            <td>{{ $student_sibling->mother_name }}</td>
                            <td>{{ $student_sibling->guardian_name }}</td>
                            <td>{{ $student_sibling->guardian_phone }}</td>
                            <td> 
                    <a href="">{{ $student_sibling->first_name.' '.$student_sibling->last_name }}</a><br>
                    <a href="">
                    {{ $student_sibling->sibling->first_name.' '.$student_sibling->sibling->last_name }}</a>
                             </td>
                            <td>{{ $student_sibling->Class->name }}({{ $student_sibling->Section->name }})</td>                           
                            <td>{{ $student_sibling->Gender->name }}</td>                                                    
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block">There is no student in this class section</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>