@extends('admin.master')
@push('css')
    <style>

        .dropify-wrapper{
            max-height: 50px;
        }

        .dropify-wrapper.has-error .dropify-message .dropify-error, .dropify-wrapper.has-preview .dropify-clear {
            display: block;
            margin-top: -5px;
        }

        .dropify-wrapper .dropify-message {
            position: relative;
            top: 73%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        /* Admit Card Demo Modal Style */

        .admin_card_demo_area{
            position: relative;
        }
        
        .backgroud_photo_area {
            position: absolute;
            top: 25%;
            bottom: 0;
            left: 36%;
            right: 0%;
            z-index: 0;
        }

        .backgroud_photo img {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            opacity: 0.2;
            height: 250px;
            width: 250px;
            border-radius: 194px;
        }

        .modal-header2 {
            background-color: white;
        }

        .modal-header2 h5 {
            color: black;
        }

        .modal-header2 .close {
            color: #000;
        }
    
        @media (min-width: 576px){
            .modal-dialog2 {
                max-width: 1000px!important;
                margin: 1.75rem auto;
            }
        }

        .school_name {
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .school_name h3 {
            font-size: 32px;
            text-align: center;
            text-transform: uppercase;
            color: #000000;
            font-family: -webkit-body;
        }

        .right_logo {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }
        .left_logo {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .admit_card_title {
            text-align: center;
            text-transform: uppercase;
            font-weight: bolder;
            color: #000000;
            font-family: -webkit-body;
        }
        
        .admit_card_title h5 {
            text-decoration: underline;
            font-weight: bolder;
        }

        .student_details h6 {
            font-size: 12px;
            color: #000;
            font-weight: 400;
            font-family: sans-serif;
        }
        .student_details  {
            margin-top: 15px;
        }
            
    </style>
    
    <link href="{{asset('public/admins/plugins/icheck/skins/all.css')}}" rel="stylesheet">
    <link href="{{asset('public/admins/plugins/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet">
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">

                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Admit Card Designees</span>
                        </div>
                    </div>

                    {{--  <a href="#" class="btn add_button btn-sm btn-success" data-toggle="modal" data-target="#admit_card_demo_modal"><i
                        class="fas fa-plus"></i></span> <span>Add Designe</span></a>  --}}

                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn add_button btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Designe</span></a>
                        </div>
                    </div>
                </div>

            </div>
          
                <div class="panel_body">
                    <div class="table-responsive all_admit_templates">
                     
                    </div>
                </div>
      
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Admit Card Template</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="store_design_form" class="form-horizontal" action="{{ route('admin.exam.master.admit.card.design.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Template Name (Must be unique)</b> :</label>
                            <input required placeholder="Template Name" type="text" class="form-control form-control -sm form-control form-control -sm-sm" value="" name="template_name">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Heading </b> :</label>
                            <input type="text" class="form-control form-control -sm form-control form-control -sm-sm" placeholder="Admin card heading" name="heading" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Title </b> :</label>
                            <input type="text" class="form-control form-control -sm form-control form-control -sm-sm" placeholder="Admin card title" name="title" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Footer Text </b> :</label>
                            <input type="text" class="form-control form-control -sm form-control form-control -sm-sm" placeholder="Footer text" name="footer_text" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Left Logo </b> :</label>
                            <input accept=".jpg, .jpeg, .png, .gif" type="file" id="left_logo" name="left_logo" id="input-file-now"
                                        class="form-control form-control -sm dropify" size="20" required/>  
                            <span class="error text-danger left_logo_error"></span>            
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Right Logo </b> :</label>
                            <input accept=".jpg, .jpeg, .png, .gif" type="file" id="right_logo" placeholder="Right Logo" name="right_logo" id="input-file-now"
                                        class="form-control form-control -sm dropify" size="20" required/>  
                            <span class="error text-danger right_logo_error"></span>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Background photo </b> :</label>
                            <input accept=".jpg, .jpeg, .png, .gif" type="file" id="right_logo" placeholder="Background photo" name="background_photo" id="input-file-now"
                                        class="form-control form-control -sm dropify" size="20" required/>  
                            <span class="error text-danger background_photo_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"><b>Student photo </b> :</label><br>
                            <input type="checkbox" name="is_student_photo" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                        </div>
                    </div>

                    <div class="form-group p-0 m-0 text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="admit_card_demo_modal"  aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog2 modal-dialog-centered modal-dialog-centered2" role="document">
        <div class="modal-content admit_card_demo_area">
            <div class="modal-header modal-header2">
                <h5 class="modal-title" id="exampleModalLabel">Admit Card Template Demo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body admit_card_demo_body">
                {{--  <div class="admin_card_demo_area">
                    <div class="school_name_area_logo_area">

                        <div class="row">

                            <div class="col-md-3">
                                <div class="left_logo">
                                    <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/5eb6c4eac99a1.png') }}">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="school_name text-center">
                                    <h3><b> Card Heading</b></h3>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="right_logo">
                                    <img width="120" height="120" src="{{ asset('public/uploads/admit_card_logo/5eb6c4eac99a1.png') }}">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="admit_card_title_area">
                        <div class="row">
                            <div class="col-md-12">
                               <div class="admit_card_title">
                                   <h5>ADMIT CARD TITLE WILL BE GO HERE</h5>
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
                                            <td width="50">Subject Name</td>
                                            <td width="50">111245</td>
                                        </tr>
                                        <tr style="color:#000;" class="text-center">
                                            <td width="50">Subject Name</td>
                                            <td width="50">111245</td>
                                        </tr>
                                        <tr style="color:#000;" class="text-center">
                                            <td width="50">Subject Name</td>
                                            <td width="50">111245</td>
                                        </tr>
                                        <tr style="color:#000;" class="text-center">
                                            <td width="50">Subject Name</td>
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
                    <div class="footer_text">
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <h6 style="text-align: center; color:#000;margin-top:10px;">Footer Test</h6>
                            </div>
                        </div>
                    </div>

                    <div class="backgroud_photo_area">
                       
                        <div class="backgroud_photo">
                            <img src="{{ asset('public/uploads/admit_card_logo/5eb8e151c085d.jpg') }}">
                        </div>  
                    
                        
                    </div>
                </div>  --}}
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admit Card Template</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
    
    <script src="{{asset('public/admins/plugins/icheck/icheck.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/icheck/icheck-active.js')}}"></script>
    <script src="{{asset('public/admins/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
  
    <script type="text/javascript">
        function log(output) {
            console.log(output);
        }
    </script>

    <script>
        function allTemplates(){
            $.ajax({
                url:"{{ url('admin/exam/master/admit/card/designees/get/all/templates') }}",
                type:'get',
                success:function(data){
                    $('.all_admit_templates').empty();
                    $('.all_admit_templates').append(data);
                }
            });
        }
        allTemplates();
    </script> 

    <script>
        $(document).ready(function () {
            $('.loading').hide();
            $(document).on('click', '.edit_admit_card_design', function(){
                var desing_id = $(this).data('id');
                var id = $(this).closest('td').data('id');
                $('.previous-'+id).hide();
                $('.button_loader-'+id).show();
                $.ajax({
                    url:"{{ url('admin/exam/master/admit/card/designees/edit') }}" + "/" + desing_id,
                    type:'get',
                    success:function(data){
                        $('.edit_modal_body').empty();
                        $('.edit_modal_body').append(data);
                        $('#editModal').modal('show');
                        $('.previous-'+id).show();
                        $('.button_loader-'+id).hide();
                    }
                });
            });
        });

    </script> 

    <script>
        $(document).ready(function () {
            $('.previous_show_button').hide();
            $(document).on('click', '.show_admit_card_design', function(){
                var desing_id = $(this).data('id');
                var id = $(this).closest('td').data('id');
                $('.previous_show_button-'+id).hide();
                $('.button_show_loader-'+id).show();
                $.ajax({
                    url:"{{ url('admin/exam/master/admit/card/designees/show') }}" + "/" + desing_id,
                    type:'get',
                    success:function(data){
                        $('.admit_card_demo_body').html(data);
                        $('#admit_card_demo_modal').modal('show');
                        $('.previous_show_button-'+id).show();
                        $('.button_show_loader-'+id).hide();
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

            $(document).on('submit', '#store_design_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                log(url);
                log(type);
                $.ajax({
                    url:url,
                    type:type,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){

                       //log(data);
                       toastr.success('Successfully admit card template generated.');
                       allTemplates();
                       $('.error').html('');
                       $('#store_design_form')[0].reset();
                       $('.dropify-render img').attr('src', '');
                       $('#myModal1').modal('hide');
                       $('.admit_card_demo_body').html(data);
                       $('#admit_card_demo_modal').modal('show');
                       
                       
                       
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.left_logo){
                            $('.left_logo_error').html(err.responseJSON.errors.left_logo[0]);
                        }else{
                            $('.left_logo_error').html('');
                        }
                        if(err.responseJSON.errors.right_logo){
                            $('.right_logo_error').html(err.responseJSON.errors.right_logo[0]);
                        }else{
                            $('.right_logo_error').html('');
                        }
                        if(err.responseJSON.errors.background_photo){
                            $('.background_photo_error').html(err.responseJSON.errors.background_photo[0]);
                        }else{
                            $('.background_photo_error').html('');
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

            $(document).on('submit', '#update_design_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                log(url);
                log(type);
                $.ajax({
                    url:url,
                    type:type,
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){

                       //log(data);
                       toastr.success('Successfully admit card template updated.');
                       allTemplates();
                       $('.uerror').html('');
                       $('#editModal').modal('hide');
                       $('.admit_card_demo_body').html(data);
                       $('#admit_card_demo_modal').modal('show');
                       
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.left_logo){
                            $('.uleft_logo_error').html(err.responseJSON.errors.left_logo[0]);
                        }else{
                            $('.uleft_logo_error').html('');
                        }
                        if(err.responseJSON.errors.right_logo){
                            $('.uright_logo_error').html(err.responseJSON.errors.right_logo[0]);
                        }else{
                            $('.uright_logo_error').html('');
                        }
                        if(err.responseJSON.errors.background_photo){
                            $('.ubackground_photo_error').html(err.responseJSON.errors.background_photo[0]);
                        }else{
                            $('.ubackground_photo_error').html('');
                        }
                    }
                });
            });
        });

    </script> 
    <script>

        $(document).ready(function () {
            
            $(document).on('click', '.change_status_button', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                       //log(data);
                       toastr.success(data);
                       allTemplates();
                    },
                    
                });
            });
        });

    </script>  

    <script>
        $(document).ready(function(){
            $(document).on('click', '#delete_admit_designe', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                swal({
                    title: "Are you sure to delete?",
                    text: "Once Delete, This will be Permanently Delete!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest('tr').remove();
                        $.ajax({
                            url:url,
                            type:'get',
                            success:function(data){
                                toastr.success(data);
                                allTemplates();
                            }
                        });
                    } else {
                        swal("Safe Data!");
                    }
                });
    
                
            })
        });
    </script>
@endpush