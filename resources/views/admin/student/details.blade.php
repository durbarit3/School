@extends('admin.master')
@push('css')
    <style>
        .panel .panel_body {border-top: 3px solid;border-radius: 3px;}
        .photo img {border-radius: 165px;padding: 3px;background-color: gray;}
        .guardian_photo{border-radius: 165px;padding: 3px;background-color: gray; margin-left: 23px;}
        .heading_area {width: 100%;background: #f7f7f7;margin: 0px;padding: 0px;text-align: center;}
        .heading_area h6 {padding: 5px 0px;letter-spacing: 1px;font-size: 17px;font-weight: 600;color: #222533;}
        .profile_tab_list ul { display: inline-flex;}
        .profile_tab_list ul li {margin-left: 16px;}
        .profile_tab_list ul li:first-child {margin-left: 0px;}
        .profile_tab_list ul li a {padding: 0px 6px;color: black;}
        .profile_tab_list ul li a:hover{border-bottom: 1px solid navy;}
        .active{ border-bottom: 1px solid navy;}
        .all_information_body td{line-height: 13px;}
        .card-header {padding: 0.50rem 1.25rem!important;}
        .salary_top_card { padding: 5px;background: #efeff0;border-radius: 4px;}
        .text-black{color: #222533;}
        @media (min-width: 576px){
            .pay_slip_modal_dialog {max-width: 900px!important;margin: 1.75rem auto;}
            .leave_applye_details_modal_dialog { max-width: 650px;margin: 1.75rem auto;}
        }
        .earn_and_deduction_area table tbody tr td {line-height: 11px;}
        .salary_sheets th {line-height: 14px;}
        svg.svg-inline--fa.fa-money-bill-alt.fa-w-20 {font-size: 22px;}
        .card_heading h6 {font-size: 14px;font-family: initial;}
        .information_border {border: 1px solid #f2f2f2;margin-bottom: 8px;}
        .table{margin-bottom: 0px!important;}
        .basic_information_list th,td {line-height: 16px;}
        .photo h6 {padding: 4px 0px;}
        .photo h6:hover{background: lightgray;border-radius: 4px; padding: 5px}
        .table-responsive.attendance_table td {width: 25%;}
        .fa-calendar-check{font-size: 22px;}
        td.match {width: 62%;}
        .card-header {padding: 0.50rem 9px!important;}
    </style>
    
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="panel_title w-100">
                        <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Student full information</span>
                        <a href="{{ route('student.index') }}" class="btn btn-sm btn-blue float-right">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel_body mt-2">
                                <div class="basic_information">
                                    <div class="employee_photo_and_name_area">
                                        <div class="photo">
                                            <div class="row justify-content-center">
                                                    <img height="140" width="140" class="" src="{{ asset('public/uploads/student/'.$student->student_photo) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="name">
                                            <div class="row justify-content-center">
                                            <h5 class="mt-1 text-black">{{ $student->first_name.' '.$student->last_name }}</h5>
                                            </div>
                                        </div>
                                        <div class="basic_information_list">
                                            <table class="table">
                                                <tbody>
        
                                                    <tr>
                                                    <th><b>Admission No :</b> </th>  
                                                    <td class="text-right">{{ $student->admission_no }}</td>  
                                                    </tr>
        
                                                    <tr>
                                                    <th><b>Roll No :</b> </th>  
                                                    <td class="text-right">{{ $student->roll_no }}</td>  
                                                    </tr>
        
                                                    <tr>
                                                    <th><b>Class :</b> </th>  
                                                    <td class="text-right">{{ $student->Class->name }}</td>  
                                                    </tr>
                                                    
                                                    <tr>
                                                    <th><b>Section :</b> </th>  
                                                    <td class="text-right">{{ $student->Section->name }}</td>  
                                                    </tr>
                                                    
                                                    <tr>
                                                    <th><b>Gender :</b> </th>  
                                                    <td class="text-right">{{ $student->Gender->name }}</td>  
                                                    </tr>
        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($student->sibling)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel_body mt-2">
                                    <div class="heading_area">
                                        <h6><b>Sibling</b></h6>
                                    </div>
                                    <div class="sibling_information">
                                        <div class="employee_photo_and_name_area">
                                            
                                            <div class="photo mb-1">
                                                <div class="row">
                                                    <a href="{{ route('student.details', $student->sibling->id) }}" class="w-100">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-5 text-center">
                                                                <img height="80" width="80" class="" src="{{ asset('public/uploads/student/'.$student->sibling->student_photo) }}" alt="">
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="row mt-4 justify-content-center">
                                                                    <h6 class="mt-1 text-black">{{ $student->sibling->first_name.' '.$student->sibling->last_name }}</h6>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <div class="basic_information_list">
                                                <table class="table">
                                                    <tbody>
            
                                                        <tr>
                                                        <th><b>Admission No :</b> </th>  
                                                        <td class="text-right">{{ $student->sibling->admission_no }}</td>  
                                                        </tr>
            
                                                        <tr>
                                                        <th><b>Roll No :</b> </th>  
                                                        <td class="text-right">{{ $student->sibling->roll_no }}</td>  
                                                        </tr>
            
                                                        <tr>
                                                        <th><b>Class :</b> </th>  
                                                        <td class="text-right">{{ $student->sibling->Class->name }}</td>  
                                                        </tr>
                                                        
                                                        <tr>
                                                        <th><b>Section :</b> </th>  
                                                        <td class="text-right">{{ $student->sibling->Section->name }}</td>  
                                                        </tr>
                                                        
                                                        <tr>
                                                        <th><b>Gender :</b> </th>  
                                                        <td class="text-right">{{ $student->sibling->Gender->name }}</td>  
                                                        </tr>
            
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                </div>

                <div class="col-md-9">
                    <div class="panel_body all_information_body mt-2">
                        <div class="profile_tab_list">
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="">
                                        <li><a data-class="profile_all_information" class="active tab_link" href="#"><b>Student details</b></a></li>
                                        <li><a data-class="fees_information" class="tab_link" href="#"><b>Fees details </b></a></li>
                                        <li><a data-class="attendance_information" class="tab_link" href="#"><b>Attendance</b></a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <a class="float-right ml-2" href="{{ url('admin/student/edit',$student->id) }}"><i class="fas fa-pencil-alt"></i></a> 
                                    @if ($student->status == 1)
                                        <a title="Active" class="float-right" href="{{ route('student.status.update',$student->id) }}"><i class="fas fa-thumbs-up"></i></a> 
                                    @else  
                                        <a title="Deactive" class="float-right text-danger" href="{{ route('student.status.update',$student->id) }}"><i class="fas fa-thumbs-down"></i></a>   
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr class="p-0 m-0 mt-1">
                        <div class="profile_all_information show tab_content">
                            <div class="another_basic_information information_border">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td class="w-50"><b>Admission Date</b>  :</td>
                                            <td class="w-50">{{ $student->admission_date }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50"><b>Date of birth</b>  :</td>
                                            <td class="w-50">{{ $student->date_of_birth }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-50"><b>Category</b>  :</td>
                                            <td class="w-50">{{ $student->Category->name }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Date of birth</b>  :</td>
                                            <td class="w-50">{{ $student->date_of_birth }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Mobile No</b>  :</td>
                                            <td class="w-50">{{ $student->student_mobile }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="w-50"><b>Religion</b>  :</td>
                                            <td class="w-50">{{ $student->religion }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="address_info information_border">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Address</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Present address</b>  :</td>
                                                <td class="w-50">{{ $student->current_address }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Permanent address</b>  :</td>
                                                <td class="w-50">{{ $student->permanent_address }}</td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div> 
                            </div> 
                            
                            <div class="guardian_info information_border">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Parent / Guardian Details</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="match"><b>Father name</b> :</td>
                                                <td class="match"> {{ $student->father_name }}</td>
                                                <td rowspan="3" class="text-center"><img class="guardian_photo" width="85" height="85" width="" src="{{ asset('public/uploads/student/'.$student->father_photo) }}" alt=""></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Father phone</b> :</td>
                                                <td class="match">{{ $student->father_phone }}</td>
                                            </tr>

                                            <tr>
                                                <td class="match"><b>Father Occupation</b> :</td>
                                                <td class="match">{{ $student->father_occupation }}</td>
                                            </tr>

                                            <tr>
                                                <td class="match"><b>Mother Name</b> :</td>
                                                <td class="match">{{ $student->mother_name }}</td>
                                                <td rowspan="3" class="text-center"><img class="guardian_photo" width="85" height="85" width="" src="{{ asset('public/uploads/student/'.$student->mother_photo) }}" alt=""></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Mother Phone </b> :</td>
                                                <td class="match">{{ $student->mother_phone }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Mother Occupation </b> :</td>
                                                <td class="match">{{ $student->mother_occupation }}</td>
                                            </tr>

                                            <tr>
                                                <td class="match"><b>Guardian Name </b> :</td>
                                                <td class="match">{{ $student->guardian_name }}</td>
                                                <td rowspan="3" class="text-center"><img class="guardian_photo" width="85" height="85" width="" src="{{ asset('public/uploads/student/'.$student->guardian_photo) }}" alt=""></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Guardian Email </b> :</td>
                                                <td class="match">{{ $student->guardian_email ? $student->guardian_email : '' }}</td>
                                            </tr>

                                            <tr>
                                                <td class="match"><b>Guardian Name </b> :</td>
                                                <td class="match">{{ $student->guardian_name }}</td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Guardian Relation </b> :</td>
                                                <td class="match">{{ $student->guardian_relation }}</td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Guardian Phone </b> :</td>
                                                <td class="match">{{ $student->guardian_phone }}</td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Guardian Occupation </b> :</td>
                                                <td class="match">{{ $student->guardian_occupation }}</td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="match"><b>Guardian Address </b> :</td>
                                                <td class="match">{{ $student->guardian_address }}</td>
                                                <td></td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="route_info information_border">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Route details</h6>
                                </div>
                                <div class="table-responsive">

                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Route</b>  :</td>
                                                <td class="w-50"> 
                                                    {{$student->route ? $student->route->name : 'N/A'}}
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Vehicle Number</b>  :</td>
                                                <td class="w-50"> 
                                                    {{$student->vehicle ? $student->vehicle->vehicle_model : 'N/A' }}
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="miscellaneous_info information_border">
                                <div class="card-header">
                                    <h6 class="p-0 m-0">Miscellaneous Details</h6>
                                </div>
                                <div class="table-responsive">

                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td class="w-50"><b>Blood group</b>  :</td>
                                                <td class="w-50"> {{ $student->bloodGroup->group_name }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Height</b>  :</td>
                                                <td class="w-50"> {{ $student->height }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Weight</b>  :</td>
                                                <td class="w-50"> {{ $student->weight }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Previous School Details</b>  :</td>
                                                <td class="w-50"> {{ $student->previous_school_detail ? $student->previous_school_detail : 'N/A' }}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="w-50"><b>Date of birth ID No / NID No</b>  :</td>
                                                <td class="w-50"> {{ $student->nid_or_birthid ? $student->nid_or_birthid : 'N/A' }}</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <div  class="fees_information tab_content mt-2">
                            @php
                                $totalAmount = 0;
                                $totalDiscount = 0;
                                $totalFine = 0;
                                $totalPaid = 0;
                                $totalDue = 0;
                            @endphp

                            @foreach ($student->feesCollection->collection as $collectionArray)
                                @php 
                                    $totalDiscount += $collectionArray['discount'] == null ? 0 : $collectionArray['discount']; 
                                    $totalAmount += $collectionArray['amount'];
                                    $totalFine += $collectionArray['fine'] == null ? 0 : $collectionArray['fine'];
                                    $totalPaid += $collectionArray['paid'] == null ? 0 : $collectionArray['paid'];
                                    if($collectionArray['is_paid'] == null){
                                        $totalDue += $collectionArray['amount'];
                                    }
                                @endphp 
                            @endforeach
                            <div class="salary_top_card_area">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Paid Fees</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalPaid }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Due Fess</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalDue }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Paid Fine</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalFine }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total Amount</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>{{ $totalAmount }}</b> 
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="far fa-money-bill-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            											
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="fees_table table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Fees Type</th>
                                                    <th>Fees Group</th>
                                                    <th>Month</th>
                                                    <th>Mode</th>
                                                    <th>Year</th>
                                                    <th>P.ID</th>
                                                    <th>P.Date</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Discount</th>
                                                    <th>Fine</th>
                                                    <th>Paid</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach ($student->feesCollection->collection as $collectionArray)
                                                <tr class="text-center">
                                                    <td>{{ $collectionArray['fees_type'] }}</td>
                                                    <td>{{ $collectionArray['fees_groups'] }}</td>
                                                    <td>{{ $collectionArray['month'] }}</td>
                                                    @if($collectionArray['mode'] == 1)
                                                        <td>Cash</td>
                                                    @elseif($collectionArray['mode'] == 2)
                                                        <td>fee</td>
                                                    @elseif($collectionArray['mode'] == 3)
                                                        <td>DD</td>
                                                    @else
                                                        <td>N/A</td>
                                                    @endif
                                                    <td>{{ $collectionArray['year'] }}</td>
                                                    <td>{{ $collectionArray['payment_id']}}</td>
                                                    <td>{{ $collectionArray['paid_date'] ? $collectionArray['paid_date'] : 'N/A' }}</td>
                                                    <td>{!!$collectionArray['is_paid'] ? '<span class="badge badge-success py-1">Paid</span>':'<span class="badge badge-danger py-1">UnPaid</span>' !!}</td>
                                                    <td>
                                                        {{ $collectionArray['amount']}}
                                                    </td>
                                                    
                                                    <td>
                                                        {{ $collectionArray['discount'] == null ? 0 : $collectionArray['discount'] }}
                                                    </td>
                                                    
                                                    <td>
                                                        {{ $collectionArray['fine'] == null ? 0 : $collectionArray['fine'] }}
                                                    </td>
                                                        
                                                    <td>
                                                        {{ $collectionArray['paid'] == null ? 0 : $collectionArray['paid'] }}
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div  class="attendance_information tab_content mt-2">
                            @php
                                $totalPresent = 0;
                                $totalAbsent = 0;
                                $totalLate = 0;
                            @endphp
                            @foreach ($student->attendances as $attendance)
                                @if ($attendance->attendance_status == 'present')
                                    @php
                                        $totalPresent +=1;
                                    @endphp
                                @elseif($attendance->attendance_status == 'absent')  
                                    @php
                                        $totalAbsent +=1;
                                    @endphp  
                                @elseif($attendance->attendance_status == 'late') 
                                    @php
                                        $totalLate +=1;
                                    @endphp   
                                @endif
                            @endforeach
                            <div class="salary_top_card_area">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total present</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>
                                                        @if ($student->attendances_count > 0)
                                                            @if ($totalPresent > 0)
                                                               {{ round($totalPresent / $student->attendances_count * 100, 2) }}% 
                                                            @else
                                                                0%
                                                            @endif 
                                                        @else
                                                            0%      
                                                        @endif
                                                    </b> 
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <i class="far fa-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    <div class="col-md-4">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total absent</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>
                                                        @if ($student->attendances_count > 0)
                                                            @if ($totalAbsent > 0)
                                                            {{ round($totalAbsent / $student->attendances_count * 100, 2) }}% 
                                                            @else
                                                                0%
                                                            @endif 
                                                        @else
                                                            0%      
                                                        @endif
                                                    </b> 
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <i class="far fa-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="salary_top_card">
                                            <div class="card_heading">
                                                <h6 class="text-black"><b>Total late</b></h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                   <b>
                                                        @if ($student->attendances_count > 0)
                                                            @if ($totalAbsent > 0)
                                                            {{ round($totalLate / $student->attendances_count * 100, 2) }}% 
                                                            @else
                                                                0%
                                                            @endif 
                                                        @else
                                                            0%      
                                                        @endif
                                                    </b> 
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <i class="far fa-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <hr class="p-0 m-0 mt-2">
                            <div class="salary_sheets mt-2">
                                <div class="table-responsive">
                                    <div class="table-responsive attendance_table">
                                        <table  class="table table-bordered table-hover mb-2">
                                            <thead>
                                                <tr class="text-left">
                                                    <th>Month</th>
                                                    <th>Present</th>
                                                    <th>Absent</th>
                                                    <th>Half-day</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $monthLists = [
                                                        'January', 'February', 'March', 'April','May', 'June', 'July', 'August', 'September', 'October' , 'November' , 'December' 
                                                    ]; 
                                                @endphp
                                                
                                                @foreach ($monthLists as $month)
                                                    @php
                                                       $MonthAtt = $student->attendances->filter(function($attendance) use ($month){
                                                            return $attendance->month == $month;
                                                        });

                                                        $present = $MonthAtt->filter(function($attendance){
                                                            return $attendance->attendance_status === 'present';
                                                        });
                                                        
                                                        $absent = $MonthAtt->filter(function($attendance){
                                                            return $attendance->attendance_status === 'absent';
                                                        });
                                                        
                                                        $late = $MonthAtt->filter(function($attendance){
                                                            return $attendance->attendance_status === 'late';
                                                        });
                                                    @endphp
                                                    <tr class="text-left">
                                                        <td>{{ $month }}</td>
                                                        <td>
                                                            @if (count($MonthAtt) > 0)
                                                                @if (count($present) > 0)
                                                                    {{ round(count($present) / count($MonthAtt) * 100, 2) }}% 
                                                                @else  
                                                                    0%   
                                                                @endif
                                                            @else  
                                                                <b>N/A</b>   
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (count($MonthAtt) > 0)
                                                                @if (count($late) > 0)
                                                                    {{ round(count($late) / count($MonthAtt) * 100, 2) }}% 
                                                                @else  
                                                                    0%   
                                                                @endif
                                                            @else  
                                                                <b>N/A</b>   
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (count($MonthAtt) > 0)
                                                                @if (count($absent) > 0)
                                                                    {{ round(count($absent) / count($MonthAtt) * 100, 2) }}% 
                                                                @else  
                                                                    0%   
                                                                @endif
                                                            @else  
                                                                <b>N/A</b>   
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@push('js')

    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#add_income_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        $('.error').html('');
                        $('#add_income_form')[0].reset();
                        $('#myModal1').modal('hide');
                        toastr.success(data);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700)
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.header_id){
                            $('.header_error').html('Income header is required');
                            
                            $('.header').addClass('is-invalid');
                        }else{
                            $('.header_error').html('');
                            $('.header').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.amount){
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                            $('.amount_error').html(err.responseJSON.errors.amount[0]);
                            
                            $('.amount').addClass('is-invalid');
                        }else{
                            $('.amount_error').html('');
                            $('.amount').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script>
    
    <script>
        $(document).ready(function () {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '.change_password_from', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        if(!data.successMsg){
                            toastr.error(data.errorMsg);
                            $('.error').html('');
                            $('.field_error').removeClass('is-invalid');
                            return;
                        }else{
                            toastr.success(data.successMsg);
                            $('.error').html('');
                            $('.change_password_from')[0].reset();
                            $('#changePasswordModal').modal('hide');
                            setInterval(function(){
                                window.location = "{{ url()->current() }}";
                            }, 800);
                        }
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.old_password){
                            $('.old_password_error').html(err.responseJSON.errors.old_password[0]);
                            $('#old_password').addClass('is-invalid');
                        }else{
                            $('.old_password_error').html('');
                            $('#old_password').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.password){
                            $('.password_error').html(err.responseJSON.errors.password[0]);
                            $('#password').addClass('is-invalid');
                        }else{
                            $('.password_error').html('');
                            $('#password').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script> 

    <script>
        $(document).ready(function(){
            $('.tab_content').hide();
            $('.show').show();
            $(document).on('click', '.tab_link', function(e){
                e.preventDefault();
                console.log('GET');
                var className = $(this).data('class');
                //console.log(className);
                $('.tab_link').removeClass('active');
                $('.tab_content').hide();
                $('.'+className).show();
                $(this).addClass('active');
            });
        });
    </script>

    <script>

        $(document).ready(function () {
            
            $(document).on('click', '.paySlipButton', function(e){
                e.preventDefault();
                console.log('GET');
                e.preventDefault();
                var url = $(this).attr('href');
                var data_id = $(this).data('id');
                var generateButton = $(this);
                    generateButton.hide();
                $('.loading_button'+data_id).show();
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        $('.pay_slip_salary_modal_body').html(data);
                        generateButton.show();
                        $('.loading_button'+data_id).hide();
                        $('.salaryPaySlipModal').modal('show');
                    }
                });
            });
        }); 

    </script>

    <script>
        $(document).ready(function () {
           $(document).on('click', '.Details', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                var data_id = $(this).data('id');
                var Details_button = $(this).hide();
                $('.button_loader'+data_id).show();
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        $('.leave_detatils_modal_body').empty();
                        $('.leave_detatils_modal_body').append(data);
                        $('.LeaveApplyeDetails').modal('show');
                        Details_button.show();
                        $('.button_loader'+data_id).hide(); 
                    }
                });
           });
        });
    </script>

@endpush