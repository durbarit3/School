@extends('admin.master')
@push('css')
<style>
    .day_area {
        width: 14%;
        height: auto;
    }

    .day_grid {

        width: 14%;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    /*
        .day_grid:last-child {
            border-right: 4px solid steelblue;
        } 
        .time_list{
            width: 100%;
        } */



    .time_list {
        font-size: 12px;
        font-weight: 600;
        box-sizing: border-box;
        margin: 4px;
        border: 1px solid;
        border-radius: 7px;

    }

    .time_list:first-child {


            {
                {
                -- border-left: 4px solid steelblue;
                --
            }
        }

    }

    .day_heading {
        height: 37px;
        padding-top: 10px;
        margin: 4px;
        border: 1px solid;
        border-radius: 7px;
    }

    .time_list.no_scheduled {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

</style>
@endpush
@section('content')
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
                                        Criteria</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">
                                    <a href="{{ route('admin.class.timetable.create') }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-plus"></i></span> <span>Add And
                                            Modify</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('admin.class.timetable.search') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>class</label>
                                    <select required name="class_id" class="select_class form-control">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                        <option @if (isset($class_id)) {{ $class_id == $class->id ? 'SELECTED' : '' }}
                                            @endif value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>class</label>
                                    <select required name="section_id" id="sections" class="form-control">
                                        <option value="">Select section</option>
                                        @if (isset($class_id))
                                        @php
                                        $classSections = App\ClassSection::where('class_id', $class_id)->get();
                                        @endphp
                                        @foreach ($classSections as $classSection)
                                        <option @if ($section_id)
                                            {{ $section_id ==  $classSection->section_id ? "SELECTED" : ""}} @endif
                                            value="{{ $classSection->section_id }}">{{ $classSection->section->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="panel_body">
                        @if (isset($class_id))
                        <div class="timetable_list_area">
                            <div class="row">
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Monday</h6>
                                    </div>
                                    @if ($mondayTimeLists->count() > 0)
                                    @foreach ($mondayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif

                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Tuesday</h6>
                                    </div>
                                    @if ($tuesdayTimeLists->count() > 0)
                                    @foreach ($tuesdayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Wednesday</h6>
                                    </div>
                                    @if ($wednesdayTimeLists->count() > 0)
                                    @foreach ($wednesdayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Thursday</h6>
                                    </div>
                                    @if ($thursdayTimeLists->count() > 0)
                                    @foreach ($thursdayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Friday</h6>
                                    </div>

                                    @if ($fridayTimeLists->count() > 0)
                                    @foreach ($fridayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Saturday</h6>
                                    </div>
                                    @if ($saturdayTimeLists->count() > 0)
                                    @foreach ($saturdayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                                <div class="day_grid">
                                    <div class="day_heading">
                                        <h6>Sunday</h6>
                                    </div>
                                    @if ($sundayTimeLists->count() > 0)
                                    @foreach ($sundayTimeLists as $timetableList)
                                    <div class="time_list">
                                        <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                                        </p>
                                        <p class="m-0 p-0">Start_time : {{ $timetableList->start_time }}</p>
                                        <p class="m-0 p-0">End_time : {{ $timetableList->end_time }}</p>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="time_list no_scheduled">
                                        <h6> Not Scheduled </h6>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
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
                url: "{{ url('admin/academic/class/timetable/get/sections/by/') }}" + "/" +classId,
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    //console.log(data);
                    $('#sections').empty();
                    $('#sections').append(' <option value="">--Select Section--</option>');
                    $.each(data, function (key, val) {
                    $('#sections').append(' <option value="' + val.section_id +'">' + val.section.name + '</option>');
                    })
                }
            })
        })
    });

</script>
@endpush
