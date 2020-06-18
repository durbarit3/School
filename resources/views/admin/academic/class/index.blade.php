@extends('admin.master')
@push('css')
<style>
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #aaa;
        border-radius: 4px;
        height: 35px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 32px;
    }
    td {
        line-height: 16px;
    }
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Classes</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Class</span></a>
                        </div>
                    </div>
                </div>

            </div>
        <form id="multiple_delete" action="{{ route('admin.class.multiple.hard.delete') }}" method="post">
                @csrf
                {{--  <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <button type="button" style="margin: 5px;" class="btn btn-sm btn-success"><i class="fas fa-recycle"></i> <a
                        href="" style="color: #fff;">Restore</a></button>  --}}
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-sm table-bordered table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Sections</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                <tr class="text-center">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$class->name}}</td>
                                    <td>
                                        @foreach ($class->classSections as $classSection)
                                        <span><b>{{ $classSection->section->name }}</b></span><br>
                                        @endforeach
                                    </td>

                                    @if($class->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($class->status==1)
                                        <a href="{{ route('admin.class.status.update', $class->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.class.status.update', $class->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="#" class="edit_class btn btn-sm btn-blue text-white" data-id="{{ $class->id }}" title="edit" data-toggle="modal"
                                        data-target="#editModal"><i class="fas fa-pencil-alt" ></i></a> |
                                        <a id="delete" href="{{ route('admin.class.hard.delete', $class->id) }}"
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
            </form>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Class</h4>
                <button type="button" class="modal_close_button close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="class_add_form" class="form-horizontal" action="{{ route('admin.class.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Name</b> :</label>
                            <input type="text" class="form-control name" placeholder="name" name="name">
                            <span class="error error_name"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label p-0 m-0"><b>Select section</b> (Multiple) :</label>
                            <select name="sectionIds[]" class="select2 sectionIds" multiple="multiple" id="section" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                <option value="">Select Sections</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <span class="error error_sectionIds"></span>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn modal_close_button btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
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
       //Initialize Select2 Elements
       $('.select2').select2()
        //Initialize Select2 Elements
    });
</script>

<script>

@error('name')
toastr.error("{{ $errors->first('name') }}");
@enderror

</script>

<script>
     $(document).ready(function () {
        $(document).on('click', '.edit_class', function(){
            var class_id = $(this).data('id');
            $.ajax({
                url:"{{ url('admin/academic/class/edit/') }}" + "/" + class_id,
                type:'get',
                success:function(data){
                    $('.edit_modal_body').empty();
                    $('.edit_modal_body').append(data);
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

            $(document).on('submit', '#class_add_form', function(e){
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
                        $('#class_add_form')[0].reset();
                        $('#myModal1').modal('hide');
                        toastr.success(data);
                        setInterval(function(){
                            window.location = "{{ url()->current() }}";
                        }, 700);
                        
                    },
                    error:function(err){
                        //log(err.responseJSON.errors);
                        if(err.responseJSON.errors.name){
                            $('.error_name').html(err.responseJSON.errors.name[0]);
                            $('.name').addClass('is-invalid');
                        }else{
                            $('.error_name').html('');
                            $('.name').removeClass('is-invalid');
                        }
                        if(err.responseJSON.errors.sectionIds){
                            $('.error_sectionIds').html('Section field is required.');
                            $('.sectionIds').addClass('is-invalid');
                        }else{
                            $('.error_sectionIds').html('');
                            $('.sectionIds').removeClass('is-invalid');
                        }
                    }
                });
            });
        });

    </script> 

@endpush
