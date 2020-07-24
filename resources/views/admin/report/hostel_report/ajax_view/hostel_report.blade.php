<style>
    th{
        line-height: 14px;
    }
    td{
        line-height: 11px;
    }
</style>
@if ($students->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Hostel report</b></h6>
        </div>
       
            <table id="dataTableExample1" class="table table-bordered mb-2">
                
                <thead>
                    <tr class="text-center">
                        <th colspan="1">Student</th>
                        <th>Admission No</th>
                        <th>Roll</th>
                        <th>Gender</th>
                        <th>Mobile</th>
                        <th>Guardian phone </th>
                        <th>Hostel name</th>
                        <th>Room number</th>
                        <th>Room type</th>
                        <th>Cost per bed</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($students as $student)
                        
                        <tr  class="text-center">
                            <td> {{ $student->first_name.' '.$student->last_name }}</td>
                            <td>{{ $student->admission_no }}</td>
                            <td>{{ $student->roll_no }}</td>
                            <td>{{ $student->Gender->name }}</td>                           
                            <td>{{ $student->student_mobile }}</td>                           
                            <td>{{ $student->guardian_phone }}</td>                           
                            <td>{{ $student->hostel->hostel_name }}</td>                           
                            <td>{{ $student->hostelRoom->room_number }}</td>                           
                            <td>{{ $student->hostelRoom->room->room_type }}</td>                           
                            <td>{{ $student->hostelRoom->cost_per_bed }}</td>                           
                        </tr>

                    @endforeach

                </tbody>
            </table>
           
        
@else
    <span class="alert alert-danger d-block">No data found.</span>
@endif

<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>