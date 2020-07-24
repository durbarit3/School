@extends('admin.master')
@push('css')
    <style>
        td {line-height: 16px;width: 20%;}
    </style> 
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Sections</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->academic_module,true)['section']['delete'] == 1) 
                                <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1">
                                    <i class="fas fa-plus"></i></span> <span>Add Section</span>
                                </a>
                            @endif        
                        </div>
                    </div>
                </div>

            </div>
        <form id="multiple_delete" action="{{ route('admin.academic.section.multiple.delete') }}" method="post">
                @csrf
                {{--  <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>  --}}
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Capacity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                <tr class="text-center">
                                  
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>{{ $section->capacity }}</td>
                                    @if($section->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if (json_decode($userPermits->academic_module,true)['section']['edit'] == 1)
                                            @if($section->status==1)
                                                <a href="{{ route('admin.academic.section.status.update', $section->id ) }}" class="btn btn-success btn-sm">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.academic.section.status.update', $section->id ) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </a>
                                            @endif
                                            |
                                        @endif

                                        <a class="edit_section btn btn-sm btn-blue text-white"
                                            data-id="{{ $section->id }}" title="edit" data-toggle="modal"
                                            data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 

                                        @if (json_decode($userPermits->academic_module,true)['section']['delete'] == 1)    
                                            | <a id="delete" href="{{ route('admin.academic.delete', $section->id) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h6 class="modal-title">Add Section</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="section_add_form" class="form-horizontal" action="{{ route('admin.academic.section.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Name </b>:</label>
                            <input type="text" class="form-control name" placeholder="Section name" name="name">
                            <span class="error name_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Capacity</b> :</label>
                            <input type="number" class="form-control capacity" placeholder="Section capacity" name="capacity">
                            <span class="error capacity_error"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn loading_button btn-sm btn-blue">Loading...</button>
                        <button type="submit" class="btn submit_button btn-sm btn-blue">Submit</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Update Section</h6>
                <button type="button" class="close modal_close_button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="section_edit_form" action="{{ route('admin.academic.section.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            <label for="name" class="col-form-label p-0 m-0"><b> Name</b> :</label>
                            <input type="text" class="form-control name" name="name" id="e_name" placeholder="Section name">
                            <input type="hidden" name="id" class="id">
                            <span class="error e_error_name"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <div class="col-sm-12">
                            <label for="capacity" class="col-form-label p-0 m-0"><b>Capacity</b> :</label>
                            <input type="text" class="form-control capacity" name="capacity" id="e_capacity" placeholder="Section capacity">
                            <span class="error e_error_capacity"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default modal_close_button" data-dismiss="modal" aria-label="">Close</button>
                        <button type="button" class="btn loading_button btn-sm btn-blue">Loading...</button>
                        @if (json_decode($userPermits->academic_module,true)['section']['edit'] == 1)
                            <button type="submit" class="btn submit_button btn-sm btn-blue">Submit</button>
                        @endif
                    </div>
                </form>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('submit', '#section_add_form', function(e){
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
                        $('.loading_button').hide();
                        $('.submit_button').show();
                        $('.error').html('');
                        $('#section_add_form')[0].reset();
                        $('#myModal1').modal('hide');
                        window.location = "{{ url()->current() }}";
                    },
                    error:function(err){
                        $('.loading_button').hide();
                        $('.submit_button').show();
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.name){
                            $('.name_error').html(err.responseJSON.errors.name[0]);
                            $('.name').addClass('is-invalid');
                        }else{
                            $('.name_error').html('');
                            $('.name').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.capacity){
                            $('.capacity_error').html(err.responseJSON.errors.capacity[0]);
                            $('.capacity').addClass('is-invalid');
                        }else{
                            $('.capacity_error').html('');
                            $('.capacity').removeClass('is-invalid');
                        }
                    }
                });
            });
        });
    </script> 

    <script type="text/javascript">
        $(document).ready(function () {
            $('.edit_section').on('click', function () {
                var sectionId = $(this).data('id');
                if (sectionId) {
                    $.ajax({
                        url: "{{ url('admin/academic/section/edit/') }}/" + sectionId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $(".name").val(data.name);
                            $(".capacity").val(data.capacity);
                            $(".id").val(data.id);
                        }
                    });
                } else {
                    alert('danger');
                }
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

			$(document).on('submit', '#section_edit_form', function(e){
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
@endpush
