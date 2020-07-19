@extends('admin.master')
@push('css')
    <style>
        .header_modal {
            padding: 5px!important;
        }
        .pay_slip_modal_header {
            padding: 5px!important;
        }

        .pay_slip_modal_header h4{
            font-size: 13px;
        }
        .header_modal h4 {
            font-size: 13px;
        }
        @media (min-width: 576px){

            .salary_generate_modal_dialog {
                max-width: 1075px!important;
                margin: 1.75rem auto;
            }
            
            .pay_slip_modal_dialog {
                max-width: 900px!important;
                margin: 1.75rem auto;
            }
  
        }

        .add_earns_area {
            padding: 3px;
            border: 1px solid lightgray;
            height: 300px;
            overflow: scroll;
        } 
        
        .add_deduction_area {
            padding: 3px;
            border: 1px solid lightgray;
            height: 300px;
            overflow: scroll;
        }

        .heading_area {
            border-bottom: 1px solid gray;
            margin-bottom: 6px;
        }

        .earn_field_remove_button {
            position: absolute;
            right: 6%;
        }

        .deduction_field_remove_button{
            position: absolute;
            right: 6%;
        }

        .remove_button {
            background: crimson;
            padding: 3px 4px;
            border-radius: 4px;
        }  

        .add_more_earn_button {
            background: gray;
            padding: 0px 8px;
            border-radius: 4px;
            margin-bottom: 2px;
            font-size: 21px;
            color: black;
        }
        
        .add_more_deduction_button {
            background: gray;
            padding: 0px 8px;
            border-radius: 4px;
            margin-bottom: 2px;
            font-size: 21px;
            color: black;
        }

        .heading_area h6 {
            font-size: 13px;
            margin-top: 5px;
        }

        .earn_table_area table tbody tr td {
            line-height: 8px;
            color: black;
        }
        .deduction_table_area table tbody tr td {
            line-height: 8px;
            color: black;
        }
        
        .earn_and_deduction_area table tbody tr td {
            line-height: 11px;
        }

        .modal-header .print_button {
            padding: 0px 6px;
            outline: none;
            border-radius: 7px;
            border-style: none;
            border: 1px solid lightgray;
            color: black!important;
            background: white;
            font-size: 14px;
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

            <div class="col-lg-12">
                <div class="panel">
                    <div class="panel_header">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel_title">
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Search Due Fees</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.due.fees.search') }}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="m-0 p-0"><b>Enter Fees Payment ID : </label>
                                </div>

                                <div class="col-md-7">
                                    <input type="number" class="form-control form-control w-100" id="std_class" name="payment_id">
                                </div>

                               
                                
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

@isset($students )

                     <div class="panel_body table_body mt-3">
                        
                        
                        <div  class="table_area">
                             <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Admission No </th>
                            <th>Student Name </th>
                            <th>Father Name </th>
                            <th>Date of Birth </th>
                            <th>Phone </th>
                            <th>Price </th>
                        </tr>
                    </thead>
                    <tbody>

                   

                   @foreach($students as $row)

                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$row->classes->name ?? ' '}}</td>
                            <td>{{$row->section}}</td>
                            <!-- <td>{{$row->section->name ?? ' '}}</td> -->
                            
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>dsgfdsgfds</td>
                            <td>
                                
                               dsafdsfdsf
                                
                            </td>
             
                            <td>
                                | <a href="{{route('admin.fees.collection',$row ->id)}}" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                            </td>
                        </tr>
                        @endforeach

               
                       

                    </tbody>
                </table>
            </div>
                        </div>
                    </div>


                </div>
                @endisset
            </div>
        </div>
    </section>


</div>

@endsection
@push('js')
    <script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>



    <script type="text/javascript">
    $(document).ready(function() {
        $('#std_class').on('change', function() {
            var id = $(this).val();
            
            
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/fees/collect/search/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                    $('#section_id').empty();
                                        $('#section_id').append(' <option value="0">--Please Select Your Section--</option>');
                                        $.each(data,function(index,sectionobj){
                                            $.each(sectionobj.sections,function(index,section){
                                                 $('#section_id').append('<option value="' + section.id + '">'+section.name+'</option>');
                                            });
                                        });
                    }
                });
            } else {
                // alert('danger');
            }

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
    
            $(document).on('submit', '.employee_attendance_from', function (e) {
                e.preventDefault();
                //console.log('GET');
                $('.save_button').hide();
                $('.loading_button').show();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: type,
                    data: request,
                    success: function (data) {
                        
                        if(!$.isEmptyObject(data.successMsg)){

                            toastr.success(data.successMsg);
                            $('.save_button').show();
                            $('.loading_button').hide();
                            
                            $('.table_area').empty();
                            $('.table_area').html('<span class="alert alert-success d-block">Successfully employee attendance has been taken in this date. Now you can edit these.</span>');

                        }
                        
                    }
                })
            });
        })   
         
    </script>

    <script>

        function searchEmployee(data) {
            $('.table_area').empty();
            $('.table_body').show(); 
            $('.loading').show(100);
            var url = $(data).attr('action');
            var type = $(data).attr('method');
            var request = $(data).serialize();
            $.ajax({
                url: url,
                type: type,
                data: request,
                success: function (data) {
                    
                    if (!$.isEmptyObject(data)) {
                        $('.table_area').html(data); 
                        $('.loading').hide(100);  
                    }
                
                }
            })
        }
    
    </script>

    <script>
        $(document).ready(function () {
            var data_id = 0;
            $(document).on('click', '.add_more_earn_button', function(e){
                e.preventDefault();
                data_id +=1;

                var more_earm_field = '<div class="earn_field mt-1">';
                 more_earm_field += '<div class="row">';
                 more_earm_field += '<div class="col-md-7">';
                 more_earm_field += '<input type="text"  placeholder="Type" name="earn_types[]"     class="form-control form-control-sm" id="earn_type'+data_id+'">';
                 more_earm_field += '</div>';
                 more_earm_field += '<div class="col-md-4">';
                 more_earm_field += '<input type="text" placeholder="amount" data-id="'+ data_id +'" name="earn_amounts[]" id="earn_amount" value="0" class="form-control earna_amounte'+data_id+' w-100 form-control-sm">';
                 more_earm_field += '</div>';
                 more_earm_field += '<div data-id="'+data_id+'" class="earn_field_remove_button">';
                 more_earm_field += '<a href="" class=" text-light remove_button"><b>X</b> </a>';
                 more_earm_field += '</div>';
                 more_earm_field += '</div>';
                 more_earm_field += '</div>';
                $('.earn_fields').append(more_earm_field);
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            var data_id = 0;
            $(document).on('click', '.add_more_deduction_button',function(e){
                e.preventDefault();
                data_id +=1;
                var more_deduction_field = '<div class="deduction_field mt-1">';
                    more_deduction_field += '<div class="row">';
                    more_deduction_field += '<div class="col-md-7">';
                    more_deduction_field += '<input type="text" placeholder="Type" name="deduction_types[]" class="form-control form-control-sm" id="deduction_type'+ data_id +'">';
                    more_deduction_field += '</div>';
                    more_deduction_field += '<div class="col-md-4">';
                    more_deduction_field += '<input type="text" placeholder="amount" data-id="'+ data_id +'" name="deduction_amounts[]" id="deduction_amount" value="0" class="deduction_amount'+data_id+' form-control w-100 form-control-sm">';
                    more_deduction_field += '</div>';
                    more_deduction_field += '<div data-id="'+ data_id +'" class="deduction_field_remove_button">';
                    more_deduction_field += '<a href="" class=" text-light remove_button"><b>X</b> </a>';
                    more_deduction_field += '</div>';
                    more_deduction_field += '</div>';
                    more_deduction_field += '</div>';
                $('.deduction_fields').append(more_deduction_field);
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.earn_field_remove_button', function(e){
                e.preventDefault();
                var data_id = $(this).data('id');
                var value = $('.earna_amounte'+data_id).val();
                var totalEarnValue = $('#total_earn').val();
                var minusTotalEarn = totalEarnValue - value;
                $('#total_earn').val(minusTotalEarn);
                var totalGrossPay = $('#gross_pay').val();
                var minusTotalGrossPay = totalGrossPay - value;
                $('#gross_pay').val(minusTotalGrossPay);
                var totalNetSalary = $('#net_total').val();
                var minusNetSalary = totalNetSalary - value;
                $('#net_total').val(minusNetSalary);
                $(this).closest('.earn_field').remove(); 
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            $(document).on('click', '.deduction_field_remove_button', function(e){
                e.preventDefault();
                var data_id = $(this).data('id');
                var value = $('.deduction_amount'+data_id).val();
                var totalDeductionValue = $('#total_deduction').val();
                var minusTotalDeduction = totalDeductionValue - parseFloat(value);
                $('#total_deduction').val(minusTotalDeduction);
                var totalGrossPay = $('#gross_pay').val();
                var plusTotalGrossPay = parseFloat(totalGrossPay) + parseFloat(value);
                $('#gross_pay').val(plusTotalGrossPay);
                var totalNetSalary = $('#net_total').val();
                var plusNetSalary = parseFloat(totalNetSalary) + parseFloat(value);
                $('#net_total').val(plusNetSalary);
                $(this).closest('.deduction_field').remove();
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            $(document).on('input', '#earn_amount', function(e){
                var data_id = $(this).data('id');
                if($(this).val() > 0){
                    $('#earn_type'+data_id).prop('required', true);
                }else{
                    $('#earn_type'+data_id).prop('required', false); 
                }
               var earn_amount = document.querySelectorAll('#earn_amount');
               var total = 0;
                
                earn_amount.forEach(function(val){
                    if(val.value != ''){
                        total += parseFloat(val.value);
                    }
                        
                });
              
                $('#total_earn').val(0);
                $('#total_earn').val(total);

                var total_earning = $('#total_earn').val();
                var total_deduction = $('#total_deduction').val();
                
                var basic_salary = $('#basic_salary').val();
                var vat_amount = $('#vat_amount').val();

                var gross_pay_amount = parseFloat(total_earning) + parseFloat(basic_salary) - parseFloat(total_deduction);
              
                $('#gross_pay').val(gross_pay_amount);

                var net_total = parseFloat(gross_pay_amount) - parseFloat(vat_amount);

                $('#net_total').val(net_total);
        
           
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            var prevous_amount = 0;
            $(document).on('input', '#deduction_amount', function(e){
                var data_id = $(this).data('id');
                if($(this).val() > 0){
                    $('#deduction_type'+data_id).prop('required', true);
                }else{
                    $('#deduction_type'+data_id).prop('required', false); 
                }
               var deduction_amount = document.querySelectorAll('#deduction_amount');
               var total = 0;
                
                deduction_amount.forEach(function(val){
                    if(val.value != ''){
                        total += parseFloat(val.value);
                    }        
                });
              
                $('#total_deduction').val(0);
                $('#total_deduction').val(total);

                var total_earning = $('#total_earn').val();
                var total_deduction = $('#total_deduction').val();

                var basic_salary = $('#basic_salary').val();

                var vat_amount = $('#vat_amount').val();

                var gross_pay_amount = parseFloat(total_earning) + parseFloat(basic_salary) - parseFloat(total_deduction);
              
                $('#gross_pay').val(gross_pay_amount);

                var net_total = parseFloat(gross_pay_amount) - parseFloat(vat_amount);

                $('#net_total').val(net_total);
            })
        })  
    </script> 
    
    <script>
        $(document).ready(function () {
            $(document).on('input', '#vat_amount', function(e){
                
                var vat_amount = $(this).val();
            
                var total_gross_pay = $('#gross_pay').val();
                var net_total = parseFloat(total_gross_pay) - parseFloat(vat_amount);
                $('#net_total').val(net_total);
                
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            
            $(document).on('click', '.salary_generate_button', function(e){
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
                        $('.generate_salary_modal_body').html(data);
                        generateButton.show();
                        $('.loading_button'+data_id).hide();
                        $('.salaryGenerateModal').modal('show');
                    }
                })
              
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            
            $(document).on('submit', '#salary_generate_form', function(e){
                e.preventDefault();
               $('.generate_loading').show(); 
               $('.generate_button').hide(); 
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data:request,
                    success:function(data){
                        console.log(data);
                        if(!$.isEmptyObject(data.successMsg)){
                            var searchFrom = $('.search_form');
                            searchEmployee(searchFrom);
                            
                            $('.generate_loading').hide(); 
                            $('.generate_button').show();
                            $('.salaryGenerateModal').modal('hide');
                            toastr.success(data.successMsg);
                        }
                    }
                })
              
            })
        })  
    </script>

    <script>
        $(document).ready(function () {
            
            $(document).on('click', '.salary_pay_button', function(e){
                e.preventDefault();
                var url = $(this).attr('href');
                var data_id = $(this).data('id');
                var salaryPayButton = $(this);
                    salaryPayButton.hide();
                $('.loading_button'+data_id).show();
                $.ajax({
                    url:url,
                    type:'get',
                    success:function(data){
                        $('.pay_salary_modal_body').html(data);
                        salaryPayButton.show();
                        $('.loading_button'+data_id).hide();
                        $('.salaryPayModal').modal('show');
                    }
                })
              
            })
        })  
    </script>
    
    <script>
        $(document).ready(function () {
            
            $(document).on('submit', '#pay_salary_form', function(e){
                e.preventDefault();
                $('.pay_loading').show(); 
                $('.pay_button').hide(); 
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data:request,
                    success:function(data){
                        if(!$.isEmptyObject(data.successMsg)){
                            var searchFrom = $('.search_form');
                            searchEmployee(searchFrom);
                            $('.pay_loading').hide(); 
                            $('.pay_button').show();
                            $('.salaryPayModal').modal('hide');
                            toastr.success(data.successMsg);
                        }
                    }
                })
              
            })
        })  
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
               })
            })
        })  
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            
            $(document).on('click', '.print_button', function (e) {
                var heading = $('.hearder_area').html();
                console.log(heading);
                $('.print_area').printThis({
                    debug: true,                   
                    importCSS: true,                
                    importStyle: false,             
                    printContainer: true,           
                    loadCSS: "{{asset('public/admins/css/pay_slip_print_style.css')}}",      
                    pageTitle: "Exam schedule",                  
                    removeInline: true,            
                    removeInlineSelector: "body *",  
                    printDelay: 333,                
                    header: heading,                   
                    footer: '<h3 style="text-align:right; margin-top:100px;">Principal\'s Signature</h3>',
                    base: true,                    
                    formValues: true,              
                    canvas: true,                  
                    doctypeString: '...',           
                    removeScripts: true,          
                    copyTagClasses: true,       
                    beforePrintEvent: null,         
                    beforePrint: null,              
                    afterPrint: null  
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker(
                {
                    format: 'dd-mm-yyyy',
                    autoclose:true
                }
            );
        })
    </script>

@endpush