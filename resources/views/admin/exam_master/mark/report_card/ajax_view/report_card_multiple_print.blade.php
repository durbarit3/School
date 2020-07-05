@foreach ($studentIds as $studentId)
@php
    $student = App\StudentAdmission::with(['Category', 'Class', 'Section', 'Gender'])
    ->select(['id', 'admission_no', 'roll_no', 'first_name', 'last_name', 'gender', 'category', 'student_mobile', 'father_name', 'mother_name', 'class', 'section', 'date_of_birth'])
    ->where('class', $classId)
    ->where('section', $sectionId)
    ->where('id', $studentId)
    ->first(); 

    $studentMarkEntires = App\MarkEntires::with('subject')
    ->select(['subject_id', 'class_id', 'section_id', 'exam_id', 'student_id', 'mark_distributions', 'is_absent'])
    ->where('exam_id', $examId)
    ->where('class_id', $classId)
    ->where('section_id', $sectionId)
    ->where('exam_id', $examId)
    ->where('student_id', $studentId)
    ->get();
@endphp  

<div style="page-break-after: always;" class="print_area">
    <div class="report_print_header_area">
        <div class="print_main_header_area">
            <div class="row justify-content-center">
                <div  class="report_print_card_header mark_sheet_table">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="school_logo_area">
                                <img src="{{ asset('public/uploads/logos/'.$generalSettings->print_logo) }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="margin-bottom:50px;" class="school_info_area text-right">
                                <h6 style="padding:0px!important;margin:0px!important;color:black!important;">{{ $generalSettings->school_name }}</h6>
                                <h6 style="padding:0px!important;margin:0px!important">{{ $generalSettings->school_address }}</h6>
                                <h6 style="padding:0px!important;margin:0px!important">Email : {{ $generalSettings->email }}</h6>
                                <h6 style="padding:0px!important;margin:0px!important">Website : {{ $generalSettings->website }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="student_details_area">
        <div class="row justify-content-center">
            
            <table class="table table-sm student_details_table table-bordered">
                <tbody>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;{{__('Student\'s Name')}}</b></td> 
                        <td class="td-small" >&nbsp;{{ $student->first_name.' '.$student->last_name }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;{{__('Father\'s Name')}}</b></td> 
                        <td class="td-small">&nbsp;{{ $student->father_name }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;{{__('Mother\'s Name')}}</b></td> 
                        <td class="td-small">&nbsp;{{ $student->mother_name }}</td> 
                    </tr>
                </tbody>
            </table>
                                    
            <table class="table table-sm student_details_table table-bordered table-small">
                <tbody>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Admission No</b></td> 
                        <td class="td-small">&nbsp;{{ $student->admission_no }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Roll No</b></td> 
                        <td class="td-small">&nbsp;{{ $student->roll_no }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Class</b></td> 
                        <td class="td-small">&nbsp;{{ $student->Class->name }} ({{ $student->Section->name }})</td> 
                    </tr>
                </tbody>
            </table>

            <table class="table table-sm student_details_table table-bordered table-small">
                <tbody>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Category</b></td> 
                        <td class="td-small">&nbsp;{{ $student->Category->name }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Date Of Birth</b></td> 
                        <td class="td-small">&nbsp;{{ $student->date_of_birth }}</td> 
                    </tr>
                    <tr>
                        <td class="td-small" style="color:black"><b>&nbsp;Gender</b></td> 
                        <td class="td-small">&nbsp;{{ $student->Gender->name }}</td> 
                    </tr>
                </tbody>
            </table>

        </div>
            
    </div>
    @if ($studentMarkEntires->count() > 0)
        <div class="mark_sheet_area">
            <div class="row justify-content-center">
                
                <table class="table table-sm mark_sheet_table table-bordered table-small w-100">
                    <thead>
                        <tr class="text-left">
                            <th width="150" style="color:black;" class="td-small"><b>Subject</b></th>
                            <th width="100" style="color:black;" class="td-small">Attendance</th>
                            @foreach (json_decode($examDistributions->distributions) as $distribution)
                            <th width="100" style="color:black;" class="td-small">{{ $distribution }}</th>
                            @endforeach
                            <th width="90" style="color:black;" class="td-small">GP</th>
                            <th width="90" style="color:black;" class="td-small">Total</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $grandTotal = 0;
                            $allSubjectPass = [];
                            $allGradePoints = [];
                            $totalSubject = 0;
                        @endphp
                        @foreach ($studentMarkEntires as $markEntire)
                            @php
                                $totalSubject +=1;
                            @endphp
                            <tr class="text-left">
                                @php
                                $scheduleSubjectDists = App\ExamSchedule::where('class_id', $markEntire->class_id)
                                    ->where('section_id', $markEntire->section_id)
                                    ->where('subject_id', $markEntire->subject_id)
                                    ->where('exam_id',$markEntire->exam_id)
                                    ->first();
                                
                                @endphp
                                <td width="150" class="td-small">{{ Str::limit($markEntire->subject->name,20) }}</td>
                                <td width="100" class="td-small">{{ $markEntire->is_absent == 1 ? 'Absent' : 'Present' }}</td>
                                    @php
                                        $total = 0;
                                        $singleSubjectPassCheck = [];
                                    @endphp
                                    @foreach (json_decode($examDistributions->distributions) as $examDistribution)
                                        @php
                                            $scheduleSubjectDist = json_decode($scheduleSubjectDists->distributions, true)[$loop->index][$examDistribution];

                                            $entriedMarks = json_decode($markEntire->mark_distributions, true)[$loop->index][$examDistribution]; 

                                            if (is_numeric($entriedMarks)){
                                                $total += $entriedMarks;
                                                if ($scheduleSubjectDist['passMarks'] !== 0 && is_numeric($scheduleSubjectDist['passMarks'])){
                                                    
                                                    if($entriedMarks >= $scheduleSubjectDist['passMarks']){
                                                        array_push($singleSubjectPassCheck, 'p');
                                                    }else{
                                                        array_push($singleSubjectPassCheck, 'f');  
                                                    } 
                                                }
                                            }

                                        @endphp
                                        @if ($scheduleSubjectDist['fullMarks'] != 0 && is_numeric($scheduleSubjectDist['fullMarks']))
                                            <td width="100" class="td-small">
                                                @if ($entriedMarks >= $scheduleSubjectDist['passMarks'])
                                                    <span class="{{$markEntire->is_absent == 1 ? 'text-danger' : ''}}">
                                                        {{ $entriedMarks }}
                                                    </span>
                                                    / {{$scheduleSubjectDist['fullMarks']}}
                                                @else
                                                <span class="text-danger">{{ $entriedMarks }}</span> / {{$scheduleSubjectDist['fullMarks']}}
                                                @endif
                                                
                                            </td> 
                                        @else
                                        <td width="100" class="td-small">N/A</td> 
                                        @endif
                                        
                                    @endforeach

                                <td width="90" class="td-small">
                                    @if (!in_array('f', $singleSubjectPassCheck))
                                        @php
                                            $MarkRanges = App\MarkRange::select(['id', 'min_percentage', 'max_percentage'])->get();
                                            $gp = '';
                                            array_push($allSubjectPass, 'p')
                                        @endphp      
                                            @foreach($MarkRanges as $markRange)
                                                @if($total >= $markRange->min_percentage && $total <= $markRange->max_percentage)
                                                    @php
                                                        $gp = App\MarkRange::where('id', $markRange->id)
                                                        ->select(['grade_point'])->first()->grade_point; 
                                                        array_push($allGradePoints, $gp);
                                                    @endphp 
                                                @endif
                                            @endforeach
                                            {{ $gp }}
                                            @else 
                                            {{ 'F' }} 
                                        @php
                                            array_push($allSubjectPass, 'f')
                                        @endphp         
                                    @endif
                                </td> 
                                <td width="90" class="td-small">{{ $total }}</td> 
                                @php
                                    $grandTotal +=$total; 
                                @endphp          
                            </tr>
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center td-small" style="color:black">Grand Total :</th>
                            <th style="color:black" class="td-small" colspan="6">{{ $grandTotal }}</th>
                        </tr>
                        <tr>
                            <th class="text-center td-small" style="color:black">Total Grade_point :</th>
                            <th style="color:black" class="td-small" colspan="6">
                                @if (!in_array('f', $allSubjectPass))
                                    @php
                                        $gradeSum = 0;
                                    @endphp
                                    @foreach ($allGradePoints as $gradePoint)
                                        @php
                                        $gradeSum += $gradePoint;  
                                        @endphp
                                    @endforeach
                                    @php
                                        $total_grade_point = $gradeSum / $totalSubject;
                                        
                                    @endphp
                                    {{ round($total_grade_point, 2) }}
                                @else 
                                {{ 'F' }}  
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center td-small" style="color:black">Result :</th>
                            <th style="color:black" class="td-small" colspan="6">
                                    @if (!in_array('f', $allSubjectPass))
                                        {{ 'Pass' }}
                                        @else 
                                        {{ 'Fail' }}  
                                    @endif

                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    @else 
        <span class="alert alert-danger d-block"> No Data available </span>
    @endif

    <div class="print_footer_area">
        <div class="print_footer_main_area">
            
            <div class="mark_sheet_table">
                <div style="margin-left:22px;" class="student_details_table">
                    <table class="table table-bordered ">
                        <tbody>
                            <tr>
                                <td>Student Behaviour</td>
                                <td>Good</td>
                            </tr>
                            <tr>
                                <td>Class Performance</td>
                                <td>Good</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
           
            <div class="signature_area mark_sheet_table">
                <div style="margin-top:100px!important;" class="row justify-content-center">
                    <div class=" signature_col text-center">
                        
                        <h6 style="padding:0px!important;margin:0px!important;">Printing Date: {{ date('d.M.Y') }}</h6>
                    </div>
                    <div class=" signature_col text-center">
                        
                        <h6 style="padding:0px!important;margin:0px!important;">Class Teacher Signature</h6>
                    </div>

                    <div class="signature_col text-center">
                            
                        <h6 style="padding:0px!important;margin:0px!important;">Gerdian Signature</h6>
                    </div>

                    <div class="signature_col text-center">
                            
                        <h6 style="padding:0px!important;margin:0px!important;">Principal Signature</h6>
                    </div>
                </div>
            </div>  
               
        </div>
        
    </div>
</div>

@endforeach
