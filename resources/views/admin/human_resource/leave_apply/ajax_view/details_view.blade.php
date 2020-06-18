<div class="row">
    <div class="col-md-6">
       <h6 class="text-dark"><b>Employee :</b>  {{ $leaveApply->employee->adminname }}</h6>  
       <h6 class="text-dark"><b>Leave :</b>  {{ $leaveApply->start_date }} - To - {{ $leaveApply->end_date }}</h6>  
       @php
            $start_date = date_create($leaveApply->start_date);
            $end_date = date_create($leaveApply->end_date);
    
            //difference between two dates
            $diff = date_diff($start_date,$end_date);
    
            //count days
            $day_count =  $diff->format("%a");
            @endphp
            
       <h6 class="text-dark"><b>Day :</b> {{ $day_count + 1 }} </h6>  
       
    </div>
    <div class="col-md-6">
        <h6 class="text-dark"><b>Employee ID :</b>  {{ $leaveApply->employee->employee_id }}</h6>  
        <h6 class="text-dark"><b>Leave type :</b>  {{ $leaveApply->leaveType->name }}</h6>  
        <h6 class="text-dark"><b>Apply date :</b>  {{ $leaveApply->apply_date }}</h6>  
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <h6 class="m-0 p-0 text-dark"><b>Reason :</b></h6>
        <hr class="p-0 mt-1">
        <p style="text-align: justify;line-height: 18px;" class="m-0 p-0"><b>{{ $leaveApply->reason }}</b></p> 
        
     </div>
     <div class="col-md-6">
        <h6 class="m-0 p-0 text-dark"><b>Attachment :</b></h6> 
        <hr class="p-0 mt-1"> 
        @if ($leaveApply->attachment_file)
            <img height="300" width="350" src="{{ asset('public/uploads/leave_apply_attachment_file/'.$leaveApply->attachment_file) }}" alt="">  
        @endif
     </div>
</div>