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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Incomes</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add new account</span></a>
                        </div>
                    </div>
                </div>

            </div>
       
            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-center">
                                
                                <th>Bank Name</th>
                                <th>Holder Name</th>
                                <th>Branch</th>
                                <th>Account_no</th>
                                <th>Opening Balance</th>
                                <th>Current Balance</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                            <tr class="text-center">
                                <td>{{ $account->bank->bank_name }}</td>
                                <td>{{ $account->holder_name }}</td>
                                <td>{{ $account->bank_branch }}</td>
                                <td>{{ $account->account_no }}</td>
                                <td>{{ $account->opening_balance }}</td>
                                <td>{{ $account->balance }}</td>
                            
                                @if($account->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                @endif
                        
                                <td data-id="{{$loop->index}}">
                                    @if($account->status==1)
                                    <a href="{{ route('admin.office.account.bank.account.change.status', $account->id ) }}"
                                        class="btn btn-success btn-sm ">
                                        <i class="fas fa-thumbs-up"></i></a>
                                    @else
                                    <a href="{{ route('admin.office.account.bank.account.change.status', $account->id ) }}"
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                    @endif
                                | <a href="#" data-id="{{ $account->id }}" title="edit" class="edit_bank edit_button btn btn-sm btn-blue text-white"><i class="fas previous-{{ $loop->index }} fa-pencil-alt"></i><img style="display:none;" height="13" width="13" class="button_loader-{{ $loop->index }} loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt=""></a> 
                                |  
                                    <a id="delete" href="{{ route('admin.office.account.bank.account.delete', $account->id) }}"
                                        class="btn btn-danger btn-sm text-white" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
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

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_account_form" class="form-horizontal" action="{{ route('admin.office.account.bank.account.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Bank :</b></label>
                            <select name="bank_id" class="form-control bank_id">
                                <option value="">Select bank</option>
                                @foreach ($banks as $bank)
                                    <option value="{{ $bank->id }}"> {{ $bank->bank_name }} </option>
                                @endforeach
                            </select>
                            <span class="error bank_id_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Holder Name </b> :</label>
                            <input type="text" class="form-control holder_name" placeholder="Bank holder name" name="holder_name">
                            <span class="error holder_name_error"></span>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Branch Name</b> :</label>
                            <input type="text" class="form-control bank_branch" placeholder="Bank bank branch" name="bank_branch">
                            <span class="error bank_branch_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Account No</b> :</label>
                            <input type="text" class="form-control account_no" placeholder="Bank account no" name="account_no">
                            <span class="error account_no_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Opening Balance</b> :</label>
                            <input type="number" class="form-control opening_balance" placeholder="Bank opening balance" name="opening_balance">
                            <span class="error opening_balance_error"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right"><b>Address </b> :</label>
                            <textarea name="address" id="" cols="10" placeholder="Bank address will go here" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bank Account</h5>
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
    <script>
        $('.loading').hide();
        $(document).ready(function () {
           $(document).on('click', '.edit_bank', function(){
            var id = $(this).closest('td').data('id');
            $('.previous-'+id).hide();
            $('.button_loader-'+id).show();
            
               var account_id = $(this).data('id');
               $.ajax({
                   url:"{{ url('admin/office/accounts/bank_accounts/edit') }}" + "/" + account_id,
                   type:'get',
                   success:function(data){
                       $('.edit_modal_body').empty();
                       $('.edit_modal_body').append(data);
                       $("#editModal").modal("show");
                       $('.previous-'+id).show();
                       $('.button_loader-'+id).hide();
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

            $(document).on('submit', '#add_account_form', function(e){
                e.preventDefault();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){

                    $('.error').html('');
                    $('#add_account_form')[0].reset();
                    $('#myModal1').modal('hide');
                    toastr.success(data);
                    setInterval(function(){
                        window.location = "{{ url()->current() }}";
                    }, 700)
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.bank_id){
                            $('.bank_id_error').html('Select bank first.');
                            $('.bank_id').addClass('is-invalid');
                        }else{
                            $('.bank_id_error').html('');
                            $('.bank_id').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.holder_name){
                            $('.holder_name_error').html(err.responseJSON.errors.holder_name[0]);
                            $('.holder_name').addClass('is-invalid');
                        }else{
                            $('.holder_name_error').html('');
                            $('.holder_name').removeClass('is-invalid');
                        }
                        
                        if(err.responseJSON.errors.bank_branch){
                            $('.bank_branch_error').html(err.responseJSON.errors.bank_branch[0]);
                            $('.bank_branch').addClass('is-invalid');
                        }else{
                            $('.bank_branch_error').html('');
                            $('.bank_branch').removeClass('is-invalid');
                        }

                        if(err.responseJSON.errors.account_no){
                            $('.account_no_error').html(err.responseJSON.errors.account_no[0]);
                            $('.account_no').addClass('is-invalid');
                        }else{
                            $('.account_no_error').html('');
                            $('.account_no').removeClass('is-invalid');
                        }

                        if(err.responseJSON.errors.opening_balance){
                            $('.opening_balance_error').html(err.responseJSON.errors.opening_balance[0]);
                            $('.opening_balance').addClass('is-invalid');
                        }else{
                            $('.opening_balance_error').html('');
                            $('.opening_balance').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script> 

@endpush