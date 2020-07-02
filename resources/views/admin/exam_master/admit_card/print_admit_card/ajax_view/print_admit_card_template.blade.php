@php
    $index = 0;
@endphp
@foreach ($student_ids as $student_id)
@php
    $student = App\StudentAdmission::with(['Class', 'Section'])->where('id', $student_id)->first();
@endphp
   

<div class="admin_card_demo_area" style="{{ $index > 0 ? 'margin-top:55px;' : ''}} page-break-after:always;">
    <div class="school_name_area_logo_area">

        <div class="row">
           
                <div class="col-md-3">
                    @if ($template->left_logo)
                        <div class="left_logo">
                            <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/'.$template->left_logo) }}">
                        </div>
                    @endif
                </div>
            
            

            <div class="col-md-6">
                <div class="school_name text-center">
                    <h3><b> {{ $template->heading }}</b></h3>
                </div>
            </div>

            <div class="col-md-3">
                @if ($template->right_logo)
                    <div class="right_logo">
                        <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/'.$template->right_logo) }}">
                    </div>  
                @endif
            </div>
        </div>

    </div>

    <div class="admit_card_title_area">
        <div class="row">
            <div class="col-md-12">
               <div class="admit_card_title">
                   <h5>{{ $template->title }}</h5>
                </div> 
            </div>
        </div>
    </div>

    <div class="admit_card_exam_name_area">
        <div class="row">
            <div class="col-md-12">
               <div class="admit_card_title">
                   <h6 style="margin-top: 5px; text-decoration:underline;">{{ $exam->name }}</h6>
                </div> 
            </div>
        </div>
    </div>

    <div class="student_details">
        <div class="row">

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-5">
                            <h6 style="text-align:right;">CANDIDATE NAME : </h6>
                            <h6 style="text-align:right;">CLASS NAME : </h6>
                            <h6 style="text-align:right;">ADMISSION NO : </h6>
                            <h6 style="text-align:right;">ROLL NO : </h6>
                        </div>

                        <div class="col-md-7">
                            <h6 style="font-weight: bolder; text-align:justify;"><b> {{ $student->first_name.' '.$student->last_name }} </b></h6>
                            <h6 style="font-weight: bolder; text-align:justify;">
                                <b> CLASS  {{ $student->Class->name }} ({{ $student->Section->name }})</b>
                            </h6>
                            <h6 style="font-weight: bolder; text-align:justify;"><b> {{ $student->admission_no }} </b></h6>
                            <h6 style="font-weight: bolder; text-align:justify;"><b> {{ $student->roll_no }}111145 </b></h6>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-5">
                            <h6 style="text-align:right;">FATHER NAME : </h6>
                            <h6 style="text-align:right;">MOTHER NAME : </h6>
                            <h6 style="text-align:right;">DATE OF BIRTH : </h6>
                            <h6 style="text-align:right;">GROUP : </h6>
                        </div>

                        <div class="col-md-7">
                            <h6 style="font-weight: bolder;"><b> {{ $student->father_name }} </b></h6>
                            <h6 style="font-weight: bolder;"><b> {{ $student->mother_name }} </b></h6>
                            <h6 style="font-weight: bolder;"><b> {{ $student->date_of_birth }} </b></h6>
                            <h6 style="font-weight: bolder;"><b> NOT AVAILABLE </b></h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="subject_list">
        <div class="row">
            <div class="col-md-10 offset-1">
                <table style="margin-top: 30px;" class="table table-sm table-bordered">
                    <thead>
                        <tr style="color:#000;" class="text-center">
                            <th width="50">Subject Name</th>
                            <th width="50">Subject Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr style="color:#000;" class="text-center">
                                <td width="50">{{ $subject->subject->name }}</td>
                                <td width="50">{{ $subject->subject->code }}</td>
                            </tr>
                        @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
    <div class="signature_area">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div style="text-align: right; color:#000;margin-top:10px;" class="signature">
                    <h6><b>Principal Signature</b></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="backgroud_photo_area">
        @if ($template->background_photo)
        <div class="backgroud_photo">
            <img  src="{{ asset('public/uploads/admit_card_logo/'.$template->background_photo) }}">
        </div>  
        @endif
    </div>

    <div class="footer_text">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h6 style="text-align: center; color:#000;margin-top:10px;">{{ $template->footer_text }}</h6>
            </div>
        </div>
    </div>
</div>

@php
    $index++;
@endphp
@endforeach