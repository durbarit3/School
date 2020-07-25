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
                            @if (json_decode($userPermits->income_module, true)['income']['add'] == 1)
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Income</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <form id="multiple_delete" action="{{ route('admin.income.multiple.delete') }}" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-3 p-0">
                                            <span class="checkmark"></span>
                                            <input type="checkbox" id="check_all">
                                        </label>
                                    </th>
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Income Head</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($incomes as $income)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$income->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $income->invoice_no }}</td>
                                    <td>{{ $income->date }}</td>
                                    <td>{{ $income->month }}</td>
                                    <td>{{ $income->year }}</td>
                                    <td>{{ $income->incomeHeader->name }}</td>
                                    <td>{{ Str::limit($income->note, 20) }}</td>
                                    @if($income->status==1)
                                        <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                        <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>{{$income->amount}}</td>
                                    <td data-id="{{$loop->index}}">
                                        @if (json_decode($userPermits->income_module, true)['income']['edit'] == 1)
                                            @if($income->status==1)
                                            <a href="{{ route('admin.income.status.update', $income->id ) }}"
                                                class="btn btn-success btn-sm ">
                                                <i class="fas fa-thumbs-up"></i></a>
                                            @else
                                            <a href="{{ route('admin.income.status.update', $income->id ) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @endif
                                            |
                                        @endif
                                     <a href="#" data-id="{{ $income->id }}" title="edit" class="edit_income btn   btn-sm btn-blue text-white"><i class="fas previous-{{ $loop->index }} fa-pencil-alt"></i>
                                        <img style="display: none;" height="13" width="13" class="button_loader-{{ $loop->index }} loading" src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
                                        </a> 
                                        @if (json_decode($userPermits->income_module, true)['income']['delete'] == 1)
                                        | <a id="delete" href="{{ route('admin.income.delete', $income->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Add Income</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="add_income_form" class="form-horizontal" action="{{ route('admin.income.store') }}" method="POST">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Invoice No :</b></label>
                            <input type="text" class="form-control" value="SI{{$invoiceId}}" name="invoice_no" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Date :</b></label>
                            <input readonly type="text" class="form-control readonly_field date_picker" value="{{ date('d-m-Y') }}" name="date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Header :</b></label>
                            <select name="header_id" class="form-control header">
                                <option value="">Select Header</option>
                                @foreach ($headers as $header)
                                    <option value="{{ $header->id }}"> {{ $header->name }} </option>
                                @endforeach
                            </select>
                            <div class="text-danger errro header_error"></div>
                        </div>
                        
                    </div>

                    <div class="form-group row">                        
                        <div class="col-sm-12">
                            <label><b>Amount :</b></label>
                            <input type="number"  class="form-control amount" placeholder="Amount" name="amount">
                            <span class="text-danger  errro amount_error"></span>
                        </div>
                        
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label><b>Note (Opt) :</b></label>
                            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="button" class="btn btn-sm loading_button btn-blue">Loading...</button>
                        @if (json_decode($userPermits->income_module, true)['income']['add'] == 1)
                            <button type="submit" class="btn btn-sm submit_button btn-blue">Submit</button>
                        @endif
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
                <h6 class="modal-title" id="exampleModalLabel">Update Income</h6>
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
        $('.loading_button').hide();
        @if (Session::has("successMsg"))
            toastr.success('{{ session('successMsg') }}', 'Successfull');
        @endif
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.modal_close_button').on('click', function(){
                $('.error').html('');
                $('.form-control').removeClass('is-invalid');
            })
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#check_all').on('click', function (e) {
                if ($(this).is(':checked', true)) {
                    $(".checkbox").prop('checked', true);
                } else {
                    $(".checkbox").prop('checked', false);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $(document).on('click', '.edit_income', function(){
                var income_id = $(this).data('id');
                var id = $(this).closest('td').data('id');
                    $('.previous-'+id).hide();
                    $('.button_loader-'+id).show();
                $.ajax({
                    url:"{{ url('admin/incomes/edit') }}" + "/" + income_id,
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#add_income_form', function(e){
                e.preventDefault();
                $('.loading_button').show();
                $('.submit_button').hide();
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        //log(data);
                        $('.loading_button').hide();
                        $('.submit_button').show();
                        $('.error').html('');
                        $('#add_income_form')[0].reset();
                        $('#myModal1').modal('hide');
                        window.location = "{{ url()->current() }}";
                    },
                    error:function(err){
                        $('.loading_button').hide();
                        $('.submit_button').show();
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
			$('.loading_button').hide();
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$(document).on('submit', '#edit_income_form', function(e){
                e.preventDefault();
				var url = $(this).attr('action');
                var type = $(this).attr('method');
                var data = $(this).serialize();
				$('.submit_button').hide();
				$('.loading_button').show();
				//var form = document.querySelector('#employee_add_form');
				//var formData = new URLSearchParams(Array.from(new FormData(form))).toString();
				$.ajax({
					url:url,
					type:type,
					data:data,
					success:function(data){
						$('.form-control').removeClass('is-invalid');
						$('.error').html('');
						$('.submit_button').show();
						$('.loading_button').hide();
						$('#editModal').modal('hide');
						window.location = "{{ url()->current() }}";
					},
					error:function(err){
						$('.submit_button').show();
						$('.loading_button').hide();
						toastr.error('Please check again all form field.','Some thing want wrong.');
						$('.error').html('');
                        $('.form-control').removeClass('is-invalid');
                
						$.each(err.responseJSON.errors,function(key, error){
							//console.log(key);
							$('.e_error_'+key).html(error[0]);
							$('#e_'+key).addClass('is-invalid');
						});
					}
				});
			});
		});
    </script> 
    
    <script>
        $(document).ready(function(){
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>
@endpush

