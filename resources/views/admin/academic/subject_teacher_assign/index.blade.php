@extends('admin.master')
@section('content')
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
    </style>
@endpush
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Subject"\'\"s Teachers</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Assign teacher</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel_body">
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                        <thead>
                            <tr class="text-left">
                                <th>Class</th>
                                <th>Section</th>
                                <th>Group</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjectTeachers as $subjectTeacher)

                                <tr class="text-left">
                                    <td>{{ $subjectTeacher['class'] }}</td>
                                    <td>{{ $subjectTeacher['section'] }}</td>
                                    <td>{{ $subjectTeacher['group'] }}</td>
                                    <td>{{ $subjectTeacher['subject'] }}</td>
                                    <td class="text-left">
                                        <b>- {{ $subjectTeacher['teacher'] }}</b> <br/>
                                    </td>
                                    @if($subjectTeacher['status']==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>
                                        @if($subjectTeacher['status']==1)
                                        <a href="{{ route('academic.assign.subject.teacher.status.update', $subjectTeacher['id'] ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('academic.assign.subject.teacher.status.update', $subjectTeacher['id'] ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif

                                    
                                        <a id="delete" href="{{ route('academic.assign.subject.teacher.delete', $subjectTeacher['id']) }}" class="btn btn-danger btn-sm text-white" title="Delete">
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
                <h4 class="modal-title">Assign Teacher To Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('academic.assign.subject.teacher.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right"><b>Class</b> :</label>
                            <select required class="form-control select_class" name="class_id">
                                <option value="">Select class</option>
                                @foreach ($formClasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select Section </b> :</label>
                            <select required class="select_section form-control" id="sections" name="section_id">
                                    <option value="">Select section</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select Subject </b> :</label>
                            <select required class="form-control" id="subjects" name="subject_id">
                                    <option value="">Select subject</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select Section </b> :</label>
                            <select class="select2" name="teacher_id" data-placeholder="Section" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                <option value="">----Select Teacher----</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->adminname }}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right"><b>Select Group</b> (optional) :</label>
                            <select class="form-control" name="group_id">
                                <option value="">----Select Group(opt)----</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>  
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script type="text/javascript">

    $(document).ready(function () {
       $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url:"{{ url('admin/academic/assign/subject/teachers/get/sections/by/') }}"+"/"+classId,
                type:'get',
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    $('#sections').empty();
                    $('#sections').append(' <option value="">--Select Section--</option>');
                    $.each(data,function(key, val){
                        $('#sections').append(' <option value="'+ val.section_id +'">'+ val.section.name +'</option>');
                    })
                }
            })
       })
    });

    $(document).ready(function () {
       $('.select_section').on('change', function () {
            var classId = $('.select_class').val();
            var sectionId = $(this).val();
            
            $.ajax({
                url:"{{ url('admin/academic/assign/subject/teachers/get/subjects/by/classId/sectionId') }}"+"/"+classId+"/"+sectionId,
                type:'get',
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    $('#subjects').empty();
                    $('#subjects').append(' <option value="">--Select Section--</option>');
                    $.each(data,function(key, val){
                        $('#subjects').append(' <option value="'+ val.subject_id +'">'+ val.subject.name +'</option>');
                    })
                }
            })
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


@endpush