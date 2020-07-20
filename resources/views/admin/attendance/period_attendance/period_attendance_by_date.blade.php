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
                                        Criteria For Period Attendance by date</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.attendance.period.by.date.attendance.search') }}"
                            method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Select Class</label>
                                    <select required name="class_id" class="select_class class_id form-control form-control-sm">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option 
                                            @if (isset($class_id)) {{ $class_id == $class->id ? 'SELECTED' : '' }}@endif value="{{ $class->id }}">
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label>Select Section</label>
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

                                <div class="col-md-3">
                                    <label>Select Subject</label>
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

                                <div class="col-md-3">
                                    <label>Select Date</label>
                                    <input type="text" required name="date" class="datepicker form-control form-control-sm" value="{{ isset($date) ? $date : date('d-m-Y') }}" data-date-format="dd-mm-yyyy">
                                    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>


                    <div class="panel_body">
                        
                        @if (isset($class_id))
                            @if ($attendances->count() > 0)
                                
                            <div class="text-left">
                                <h6 style="color:black; border-bottom:1px solid;"><b>Period Attendance date of : {{ $date }}</b></h6>
                            </div>
                            <div class="table-responsive table_area">

                                <form id="attendance_modify_from" method="post"
                                    action="{{ route('admin.attendance.period.by.date.attendance.update') }}">
                                    @csrf
                                    <table id="dataTableExample1"
                                        class="table table-bordered table-striped table-sm table-hover mb-2">
                                        <thead>
                                            <tr class="text-center">
                                              
                                                <th>Roll</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Subject</th>
                                                <th>Photo</th>
                                                <th>Attendance</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($attendances as $attendance)
                                            <tr class="text-center">
                                               
                                                <td>{{ $attendance->student->roll_no }}</td>
                                                <td>{{ $attendance->student->first_name.' '.$attendance->student->last_name }}</td>
                                                <td>{{ $attendance->class->name }}</td>
                                                <td>{{ Str::limit($attendance->subject->name, 28) }}</td>
                                                <td>
                                                    <img height="40" width="40"
                                                        src="{{ asset('public/uploads/student/'.$attendance->student->student_photo) }}">
                                                </td>
                                                <td>
                                                    <div class="row justify-content-center">
                                                        <div class="form-inline ml-1">
                                                            <input required type="radio" 
                                                            {{ $attendance->attendance_status == 'present' ? 'CHECKED' : '' }} class="form-control"
                                                                name="attendance_ids[{{$attendance->id}}]" value="present">&nbsp;
                                                            <b>Present |</b>
                                                        </div>
                                                        <div class="form-inline ml-1">
                                                            <input type="radio" class="form-control"
                                                                name="attendance_ids[{{$attendance->id}}]"
                                                                {{ $attendance->attendance_status == 'absent' ? 'CHECKED' : '' }}
                                                                value="absent">&nbsp;
                                                            <b>Absent |</b>
                                                        </div>
                                                        <div class="form-inline ml-1">
                                                            <input required type="radio" class="form-control"
                                                                name="attendance_ids[{{$attendance->id}}]" 
                                                                value="late"
                                                                {{ $attendance->attendance_status == 'late' ? 'CHECKED' : '' }}
                                                                >&nbsp;
                                                            <b>Late |</b>
                                                        </div>


                                                        <div class="form-inline ml-1">
                                                            <input required type="radio" class="form-control"
                                                                name="attendance_ids[{{$attendance->id}}]" 
                                                                value="half_day"
                                                                {{ $attendance->attendance_status == 'half_day' ? 'CHECKED' : '' }}
                                                                >
                                                            &nbsp;<b>Half Day |</b>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><input type="text" value="{{ $attendance->note }}" placeholder="Note" name="notes[{{ $attendance->id }}]"
                                                        class=" form-control form-control-sm">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if (json_decode($userPermits->attendance_module, true)['period_attendance']['edit'] == 1) 
                                    <input type="submit" class="btn btn-sm btn-blue" value="Update">
                                    @endif
                                </form>
                            </div>
                            @else
                            <span class="alert alert-danger d-block">No Period Attendance Abailable</span>
                            @endif
                        @endif
                    </div>
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
                url: "{{ url('admin/attendance/period/by/date/get/sections/by/') }}" + "/" + classId,
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
                url: "{{ url('admin/attendance/period/by/date/get/subjects/by/') }}" + "/" + classId + "/" + sectionId,
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
                        $('.is_subjects').html('<b>Subject is not available in this class section</b>');
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

        $('#attendance_modify_from').submit(function (e) {
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
                        toastr.success(data.successMsg);
                    }
                }
            })

        })
    }) 
</script>

<script>
    $(document).ready(function(){
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose:true
        });
    })
</script>
@endpush