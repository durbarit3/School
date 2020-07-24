@extends('admin.master')
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
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Select
                                        Criteria For Period Attendance</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.attendance.period.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-4">
                                    <label class="p-0 m-0"><b> class :</b></label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                        <option @if (isset($class_id)) {{ $class_id == $class->id ? 'SELECTED' : '' }}
                                            @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="p-0 m-0"><b> Section :</b></label>
                                    <select required name="section_id" id="sections"
                                        class="form-control form-control-sm select_section section_id">
                                        <option value="">Select section</option>
                                        @if (isset($class_id))
                                        @php
                                        $classSections = App\ClassSection::where('class_id', $class_id)->get();
                                        @endphp
                                        @foreach ($classSections as $classSection)
                                        <option @if ($section_id)
                                            {{ $section_id == $classSection->section_id ? "SELECTED" : ""}} @endif
                                            value="{{ $classSection->section_id }}">{{ $classSection->section->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <small class="text-danger is_subjects"> </small>
                                </div>

                                <div class="col-md-4">
                                    <label class="p-0 m-0"><b> Subject :</b></label>
                                    <select required name="subject_id" id="subjects" class="form-control form-control-sm">
                                        <option value="">Select subject</option>
                                        @if (isset($class_section_id))
                                        @php
                                        $classSectionSubjects =
                                        App\ClassSubject::with('subject')->where('class_section_id',
                                        $class_section_id)->get();
                                        @endphp
                                        @foreach ($classSectionSubjects as $subject)
                                        <option @if ($subject)
                                            {{ $subject_id ==  $subject->subject->id ? "SELECTED" : ""}} @endif
                                            value="{{ $subject->subject->id }}">{{ $subject->subject->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    @if (isset($class_id))

                    <div class="panel_body mt-2">

                        <div class="text-left">
                            <h6 style="color:black; border-bottom:1px solid;"><b>Today : {{ date('d-F-Y') }}</b></h6>
                        </div>
                        
                        @php
                            $periodAttendance = App\PeriodAttendance::where('class_id', $class_id)
                            ->where('section_id', $section_id)
                            ->where('subject_id', $subject_id)
                            ->where('month', date('F'))
                            ->where('year', date('Y'))
                            ->where('date', date('d-m-Y'))
                            ->first();
                        @endphp
                            @if ($students->count() > 0)

                                @if (!$periodAttendance)
                                <div class="table-responsive table_area">

                                    <form id="attendance_from_submit" method="post"
                                        action="{{ route('admin.attendance.period.attendance.store') }}">
                                        @csrf
                                        <div class="hidden_field">
                                            <input type="hidden" name="class_id" value="{{ $class_id }}">
                                            <input type="hidden" name="section_id" value="{{ $section_id }}">
                                            <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                                        </div>
                                        <table id="dataTableExample1"
                                            class="table table-bordered table-striped table-sm table-hover mb-2">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Serial</th>
                                                    <th>Roll</th>
                                                    <th>Name</th>
                                                    <th>Class</th>
                                                    <th>Photo</th>
                                                    <th>Attendance</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($students as $student)
                                                <tr class="text-center">
                                                    <td>{{ $student->key + 1 }}</td>
                                                    <td>{{ $student->roll_no }}</td>
                                                    <td>{{ $student->first_name.' '.$student->last_name }}</td>
                                                    <td>{{ $student->Class->name }}</td>
                                                    <td>
                                                        <img loading="lazy" height="40" width="40"
                                                            src="{{ asset('public/uploads/student/'.$student->student_photo) }}">
                                                    </td>
                                                    <td>
                                                        <div class="row justify-content-center">
                                                            <div class="form-inline ml-1">
                                                                <input required type="radio" class="form-control"
                                                                    name="student_ids[{{$student->id}}]" value="present">&nbsp;
                                                                <b>Present |</b>
                                                            </div>
                                                            <div class="form-inline ml-1">
                                                                <input type="radio" class="form-control"
                                                                    name="student_ids[{{$student->id}}]" value="absent">&nbsp;
                                                                <b>Absent |</b>
                                                            </div>
                                                            <div class="form-inline ml-1">
                                                                <input required type="radio" class="form-control"
                                                                    name="student_ids[{{$student->id}}]" value="late">&nbsp;
                                                                <b>Late |</b>
                                                            </div>


                                                            <div class="form-inline ml-1">
                                                                <input required type="radio" class="form-control"
                                                                    name="student_ids[{{$student->id}}]" value="half_day">
                                                                &nbsp;<b>Half Day</b>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><input type="text" placeholder="Note" name="notes[]"
                                                            class=" form-control form-control-sm">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <input type="submit" class="btn btn-sm btn-blue" value="Save">
                                    </form>
                                </div>
                                @else
                                    <span class="alert alert-primary d-block">Today period attendance has already been taken of this class section of this subject. You can edit this form period attendance by date section</span>
                                @endif
                            @else
                                <span class="alert alert-danger d-block">Student is not available in this class of this section.</span>
                            @endif    
                    </div>
                    @endif    
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url: "{{ url('admin/ajax/class/sections/') }}" + "/" + classId,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $('#sections').empty();
                    $('#sections').append(' <option value="">--Select Section--</option>');
                    $.each(data, function (key, val) {
                        $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                    })
                }
            })
        })
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.is_subjects').hide();
        $('.select_section').on('change', function () {

            var classId = $('.class_id').val();
            var sectionId = $(this).val()
            $.ajax({
                url: "{{ url('admin/attendance/period/get/subjects/by/') }}" + "/" + classId + "/" + sectionId,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('.is_subjects').empty();

                    $('#subjects').empty(500);
                    if (!$.isEmptyObject(data)) {
                        $('#subjects').append(' <option value="">--Select Subject--</option>');
                        $.each(data, function (key, val) {
                            $('#subjects').append(' <option value="' + val.subject_id + '">' + val.subject.name + '</option>');
                        })
                    } else {
                        $('.is_subjects').hide(100);
                        $('.is_subjects').show(100);
                        $('.is_subjects').html('<b>Yet to be assigned any subject in this class section</b>');
                    }
                }
            })
        })
    });

</script>

<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#attendance_from_submit').submit(function (e) {
            e.preventDefault();

            var url = $(this).attr('action');
            var type = $(this).attr('method');
            var request = $(this).serialize();
            $.ajax({
                url: url,
                type: type,
                data: request,
                success: function (data) {
                    console.log(data);
                    if (!$.isEmptyObject(data.successMsg)) {
                        $('.table_area').empty();
                        $('.table_area').html('<span class="alert alert-success float-left w-100 d-block">' + data.successMsg + '</span>');
                        toastr.success(data.successMsg);
                    }
                }
            })

        })
    }) 
</script>
@endpush