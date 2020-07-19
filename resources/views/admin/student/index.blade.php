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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Student</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            @if (json_decode($userPermits->student_module, true)['add'] == 1)
                                <a href="{{ route('student.create') }}" class="btn btn-sm btn-success"><i
                                class="fas fa-plus"></i></span> <span>Add Student</span></a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
            <form id="multiple_delete" action="{{ route('admin.category.multiple.hard.delete') }}" method="post">

                @csrf
                <!-- <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete all</button> -->
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Admission No</th>
                                    <th>Roll No</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Father name</th>
                                    <th>Date Of Birth</th>
                                    <th>Gender</th>
                                    <th>Category</th>
                                    <th>Mobile Number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allstudent as $key => $data)
                                <tr class="text-center">
                                    <td>{{++$key}}</td>
                                    <td>{{$data->admission_no}}</td>
                                    <td>{{$data->roll_no}}</td>
                                    <td>{{$data->first_name}} {{$data->last_name}}</td>
                                    <td>{{$data->Classes->name ?? ''}}</td>
                                    <td>{{$data->father_name}}</td>
                                    <td>{{$data->date_of_birth}}</td>
                                    <td>{{$data->Gender->name}}</td>
                                    <td>{{$data->Category->name}}</td>
                                    <td>{{$data->father_phone}}</td>
                                    <td>
                                        <a href="{{ route('student.details', $data->id) }}"
                                            class="btn btn-info btn-sm text-white" title="Show">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        @if (json_decode($userPermits->student_module, true)['edit'] == 1)
                                            | <a href="{{ url('admin/student/edit',$data->id) }}" class="btn btn-sm btn-blue text-white"title="edit"><i class="fas fa-pencil-alt"></i></a> |
                                        @endif
                                        @if (json_decode($userPermits->student_module, true)['delete'] == 1)
                                            <a  href="" class="btn btn-danger btn-sm text-white" title="Payment">
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

@endsection


