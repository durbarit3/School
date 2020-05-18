<div class="admin_card_demo_area">
    <div class="school_name_area_logo_area">

        <div class="row">
           
                <div class="col-md-3">
                    @if ($addDesing->left_logo)
                        <div class="left_logo">
                            <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/'.$addDesing->left_logo) }}">
                        </div>
                    @endif
                </div>
            
            

            <div class="col-md-6">
                <div class="school_name text-center">
                    <h3><b> {{ $addDesing->heading }}</b></h3>
                </div>
            </div>

            <div class="col-md-3">
                @if ($addDesing->right_logo)
                    <div class="right_logo">
                        <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/'.$addDesing->right_logo) }}">
                    </div>  
                @endif
            </div>
        </div>

    </div>

    <div class="admit_card_title_area">
        <div class="row">
            <div class="col-md-12">
               <div class="admit_card_title">
                   <h5>{{ $addDesing->title }}</h5>
                </div> 
            </div>
        </div>
    </div>

    <div class="admit_card_exam_name_area">
        <div class="row">
            <div class="col-md-12">
               <div class="admit_card_title">
                   <h6 style="margin-top: 5px; text-decoration:underline;">SECOND TERM EXAM 2020</h6>
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
                            <h6 style="font-weight: bolder; text-align:justify;"><b> STUDENT NAME </b></h6>
                            <h6 style="font-weight: bolder; text-align:justify;"><b> CLASS  6 (A)</b></h6>
                            <h6 style="font-weight: bolder; text-align:justify;"><b> 225554 </b></h6>
                            <h6 style="font-weight: bolder; text-align:justify;"><b> 111145 </b></h6>
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
                            <h6 style="font-weight: bolder;"><b> FATHER NAME </b></h6>
                            <h6 style="font-weight: bolder;"><b> MOTHER NAME </b></h6>
                            <h6 style="font-weight: bolder;"><b> 1984-04-26 </b></h6>
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
                <table class="table mt-2 table-sm table-bordered">
                    <thead>
                        <tr style="color:#000;" class="text-center">
                            <th width="50">Subject Name</th>
                            <th width="50">Subject Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="color:#000;" class="text-center">
                            <td width="50">Bangla 1st paper</td>
                            <td width="50">111245</td>
                        </tr>
                        <tr style="color:#000;" class="text-center">
                            <td width="50">Bangla 2nd paper</td>
                            <td width="50">111245</td>
                        </tr>
                        <tr style="color:#000;" class="text-center">
                            <td width="50">English 1st paper</td>
                            <td width="50">111245</td>
                        </tr>
                        <tr style="color:#000;" class="text-center">
                            <td width="50">English 2nd paper</td>
                            <td width="50">111245</td>
                        </tr>
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
        @if ($addDesing->background_photo)
        <div class="backgroud_photo">
            <img  src="{{ asset('public/uploads/admit_card_logo/'.$addDesing->background_photo) }}">
        </div>  
        @endif
    </div>

    <div class="footer_text">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h6 style="text-align: center; color:#000;margin-top:10px;">{{ $addDesing->footer_text }}</h6>
            </div>
        </div>
    </div>


</div>