@extends('admin.master')
@section('content')
   
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Withdraws</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->office_accounts_module, true)['withdraw']['add'])
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Withdraw</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="panel_body">
                <div class="table-responsive all_withdraws">
                    
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
                <h4 class="modal-title">Bank Withdraw Entire</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="withdraw_add_form" class="form-horizontal" action="{{ route('admin.office.account.withdraw.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="direction" class="direction">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0">Invoice No  :</label>
                            <input type="text" class="form-control invoice_no form-control-sm" value="BW{{ $invoiceId }}" name="invoice_no" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0">Date  :</label>
                            <input type="text" autocomplete="off" placeholder="dd-mm-yyyy" class="form-control add_dipo_date_picker date form-control-sm" name="date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label  class="col-form-label p-0 m-0">  Voucher Header  :</label>
                            <select required name="voucher_id" class="form-control voucher_id form-control-sm">
                                <option value="">Select voucher header</option>
                                @foreach ($voucherHeaders as $voucherHeader)
                                    <option value="{{ $voucherHeader->id }}">{{ $voucherHeader->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12"> 
                            <label  class="col-form-label p-0 m-0"> Bank :</label>
                            <select required name="bank_id" class="form-control bank_id banks form-control-sm">
                                <option value=""> Select Bank </option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label  class="col-form-label p-0 m-0"> Account :</label>
                            <select required name="account_id" class="form-control account_id bank_accounts form-control-sm">
                                <option value=""> Select Account </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Account No :</label>
                            <input readonly type="text" placeholder="Account number" class="form-control form-control-sm account_number" value="" name="account_no" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Pay Amount :</label>
                            <input type="text" placeholder="Withdraw amount" class="form-control amount form-control-sm" value="" name="amount" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label p-0 m-0"> Remarks (Optional) :</label>
                            <input type="text" name="remarks" class="form-control remarks form-control-sm">
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <input type="submit" name="save" value="Save" class="btn save btn-sm btn-blue">
                        <input type="submit" name="save_and_print" value="Save & Print" class="btn save_and_print button btn-sm btn-blue">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Withdraw</h5>
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
<script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.banks').on('change', function(){
            var bank_id = $(this).val();
            $.ajax({
                url:"{{ url('admin/office/accounts/withdraws/get/account/by') }}" + "/" + bank_id,
                type:'get',
                success:function(data){
                    $('.bank_accounts').empty();
                    $('.bank_accounts').append(' <option value="">Select account</option>');
                    $.each(data, function (key, val) {
                        $('.bank_accounts').append(' <option value="' + val.id + '">' + val.holder_name + '</option>');
                    })
                }
            });
        }) 
    }) 
</script>

<script>
    $(document).ready(function () {
        $('.bank_accounts').on('change', function(){
            var account_id = $(this).val();
            $.ajax({
                url:"{{ url('admin/office/accounts/withdraws/get/account/number/by') }}" + "/" + account_id,
                type:'get',
                success:function(data){
                    $('.account_number').empty();
                    $('.account_number').val(data.account_no);
                }
            });
        }) 
    }) 
</script>

<script>
    function allWithdraws (){
        $.ajax({
            url:"{{ url('admin/office/accounts/withdraws/all') }}",
            type:'get',
            success:function(data){
                $('.all_withdraws').empty();
                $('.all_withdraws').html(data);
            }
        });
    }
    allWithdraws();
</script>

<script>
    $(document).ready(function () {
        
        $('.save_and_print').on('click', function(){
            var value = $(this).val();
            $('.direction').val(value);
        })

        $('.save').on('click', function(){
            var value = $(this).val();
            $('.direction').val(value);
        })
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#withdraw_add_form').on('submit', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var type = $(this).attr('method');

            var invoice_no = $('.invoice_no').val();
            var date = $('.date').val();
            var voucher_id = $('.voucher_id').val();
            var bank_id = $('.bank_id').val();
            var account_id = $('.account_id').val();
            var amount = $('.amount').val();
            var remarks = $('.remarks').val();
            var direction = $('.direction').val();
            
            $.ajax({
                url: url,
                type: type,
                data: {
                    invoice_no:invoice_no,
                    date:date,
                    voucher_id:voucher_id,
                    bank_id:bank_id,
                    account_id:account_id,
                    amount:amount,
                    remarks:remarks,
                    direction:direction,
                },
                success: function (data) {
                    
                    if(!$.isEmptyObject(data.success)){
                        toastr.success(data.success);
                         Swal.fire({
                            position: 'middle',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }); 
                        $('#withdraw_add_form')[0].reset();
                        $('#myModal1').modal('hide');
                        allWithdraws();
                    }else{
                        toastr.success('Withdraw added successfully.');
                        Swal.fire({
                            position: 'middle',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#withdraw_add_form')[0].reset();
                        $('#myModal1').modal('hide');
                        allWithdraws();
                        $(data).printThis({
                            debug: true,                   
                            importCSS: true,                
                            importStyle: false,             
                            printContainer: true,           
                            loadCSS: "",      
                            pageTitle: "Bank Withdraw Invoice",                  
                            removeInline: true,            
                            removeInlineSelector: "body *",  
                            printDelay: 333,                
                            header: null,                   
                            footer: null,
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

                    }
        
                },
                error:function(error){
                    console.log(error);
                }
            })
        });
    }) 
    
</script>

<script>

    $(document).ready(function () {
        $(document).on('click', '.edit_withdraw', function(){
            var withdraw_id = $(this).data('id');
            var id = $(this).closest('td').data('id');
            $('.previous-'+id).hide();
            $('.button_loader-'+id).show();
            $.ajax({
                url:"{{ url('admin/office/accounts/withdraws/edit') }}" + "/" + withdraw_id,
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
            
        $(document).on('submit', '#withdraw_update_form', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var date = $('.edit_date').val();
            var remarks = $('.edit_remarks').val();
            var voucher_id = $('.edit_voucher_id').val();
            $.ajax({
                url: url,
                type: type,
                data: {
                    date:date,
                    remarks:remarks,
                    voucher_id:voucher_id,
                },
                success: function (data) {
                    
                    if(!$.isEmptyObject(data.success)){
                        toastr.success(data.success);
                        $('#withdraw_update_form')[0].reset();
                        $('#editModal').modal('hide');
                        allWithdraws();
                    }
        
                },
                error:function(error){
                    console.log(error);
                }
            })
        });
    }) 
        
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#chenge_status_button', function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url:url,
                type:'get',
                success:function(data){
                    toastr.success(data);
                    allWithdraws();
                }
            });
        })
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#delete_withdraw', function(e){
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
                        }
                    });
                } else {
                    swal("Safe Data!");
                }
            });

            
        })
    });
</script>

<script>
    $(document).ready(function(){
        $(".add_dipo_date_picker").datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true
        });
    });
</script>

@endpush