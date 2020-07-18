@extends('admin.master')
@push('css')
    <style>

        @media (min-width: 576px){
            .leave_applye_details_modal_dialog {
                max-width: 800px;
                margin: 1.75rem auto;
            }
        }

    </style>
@endpush
@section('content')
@php
    date_default_timezone_set('Asia/Dhaka');
@endphp


<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Leave applies</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            
                        </div>
                    </div>
                </div>
            </div>
      
            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                <th>Employee</th>
                                <th>Leave Type</th>
                                <th>Leave Date</th>
                                <th>Apply Date</th>
                                <th>Day</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaveApplies as $leaveApply)
                                @php
                                    $start_date = date_create($leaveApply->start_date);
                                    $end_date = date_create($leaveApply->end_date);
                                    //difference between two dates
                                    $diff = date_diff($start_date,$end_date);
                                    //count days
                                    $day_count =  $diff->format("%a");
                                @endphp
                                <tr class="text-center"
                                    data-user="
                                    {{ $leaveApply->employee->adminname }},
                                    {{ $leaveApply->employee->employee_id }},
                                    {{ $leaveApply->leaveType->name }},
                                    {{ $leaveApply->apply_date }},
                                    {{ $leaveApply->start_date }} <b> - To -</b> {{ $leaveApply->end_date }},
                                    {{ $day_count + 1 }},
                                    {{ $leaveApply->approval }},
                                    {{ $leaveApply->reason }},
                                    {{ $leaveApply->attachment_file }},
                                    {{ $leaveApply->id }}
                                    "
                                >
                                    <td>{{ $leaveApply->employee->adminname }}</td>
                                    <td>{{ $leaveApply->leaveType->name }}</td>
                                    <td>{{ $leaveApply->start_date }} <b> - To -</b> {{ $leaveApply->end_date }}</td>
                                    <td>{{ $leaveApply->apply_date }}</td>
                                    <td>
                                        {{ $day_count + 1 }}
                                    </td>
                                    <td>
                                        @if ($leaveApply->approval == 0)
                                            <span class="badge badge-warning approval p-2">Pandding</span>
                                        @elseif($leaveApply->approval == 1)  
                                            <span class="badge badge-success approval pb-2 pt-1 py-1">Approved</span> 
                                        @elseif($leaveApply->approval == 2)
                                            <span class="badge badge-danger approval p-2">Rejected</span>    
                                        @endif
                                    </td>
                                    <td>
                                        <a class="Details btn btn-sm btn-blue text-white" 
                                            title="Details" data-id="{{ $leaveApply->id }}" href="" data-toggle="modal"
                                            data-target="#LeaveApplyeDetails"><i class="fas fa-file-alt"></i>
                                        </a>
                                        <button style="display: none;" class="btn btn-sm button_loader{{ $leaveApply->id }} btn-blue">
                                            <img height="13" width="13"  src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          
        </div>
    </section>
</div>


<div class="modal fade LeaveApplyeDetails" id="LeaveApplyeDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog leave_applye_details_modal_dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Leave details</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body leave_detatils_modal_body">
                <div class="row">
                    <div class="col-md-6">
                       <h6 class="text-dark"><b>Employee :</b> <span class="name"></span> </h6>  
                       <h6 class="text-dark"><b>Leave :</b> <span class="leave"></span> </h6>   
                       <h6 class="text-dark"><b>Day :</b> <span class="day"></span> </h6>  
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-dark"><b>Employee ID :</b>  <span class="employee_id"></span></h6>  
                        <h6 class="text-dark"><b>Leave type :</b> <span class="leave_type"></span> </h6>  
                        <h6 class="text-dark"><b>Apply date :</b> <span class="apply_date"></span></h6>  
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="m-0 p-0 text-dark"><b>Reason :</b></h6>
                        <hr class="p-0 mt-1">
                        <p style="text-align: justify;line-height: 18px;" class="m-0 p-0">
                            <b><span class="reason"></span> </b>
                        </p> 
                        
                     </div>
                     <div class="col-md-6">
                        <h6 class="m-0 p-0 text-dark"><b>Attachment :</b></h6> 
                        <hr class="p-0 mt-1"> 
                        <div class="attachment_file text-center">      
                        </div>
                     </div>
                </div>

                @if (json_decode($userPermits->human_resource_module, true)['leave_approval']['edit'] == 1)
                <div class="row">
                    <div class="col-md-12">
                        <form class="leave_approval_form" action="{{ route('admin.hr.leave.approval.action') }}" method="POST">
                            @csrf
                            <input type="hidden" class="leave_apply_id" name="leave_apply_id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="float-right">
                                        <tr>
                                            <td>
                                            <b> Pandding</b>  <input class="approval_pandding" name="approval" value="0" type="radio"> &ensp;&ensp; 
                                            <b> Reject</b> <input class="approval_reject" name="approval" value="2" type="radio"> &ensp;&ensp;
                                            <b>Approve</b> <input class="approval_Approved" name="approval" value="1" type="radio"> 
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-sm btn-blue float-right" type="submit">Submit</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    <script type="text/javascript">

        $(document).ready(function () {

            $('#submit_loading').hide();

        });

    </script>
    

    <script>
         $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

           $(document).on('submit', '.leave_approval_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:'post',
                    data:request,
                    success:function(data){
                        console.log(data);
                         toastr.success(data.successMsg);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700); 
                    }
                });
           });
        }); 

        $(document).ready(function () {
            
           $(document).on('click', '.Details', function(e){
                e.preventDefault();
                var tr = $(this).closest('tr');
                var data = tr.data('user').split(',');
                $('.name').html(data[0]);
                $('.employee_id').html(data[1]);
                $('.leave_type').html(data[2]);
                $('.leave').html(data[4]);
                $('.apply_date').html(data[3]);
                $('.reason').html(data[7]);
                $('.day').html(data[5]);
                $('.leave_apply_id').val(data[9]);
                if(data[6] == 0){
                    $('.approval_pandding').prop('checked', true);
                }else if(data[6] == 1){
                    $('.approval_Approved').prop('checked', true);
                }else{
                    $('.approval_reject').prop('checked', true);
                }

                var imgUrl = "{{ asset('public/uploads/leave_apply_attachment_file/')}}"+"/"+data[8].trim();
               
                var img = '<img height="200" width="200" class="rounded attachment_file" src="'+imgUrl+'" alt="">';
                $('.attachment_file').html(img);
               

             
           });
        });
    </script>
    
  
@endpush
