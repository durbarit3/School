<style>
         {{-- select.form-control.form-control-sm.schedule_exam_hall_field {
            width: 85px;
        } --}}
        td{
            cursor: pointer;
        }
        input.form-control.schedule_exam_marks_field.form-control-sm {
            width: 81px;
        }
        
        th.date_fiel {
            width: 100px;
        }


        th.time_fiels {
            width: 100px;
            padding: 0px;
        }
        fiels_left_margin{
            margin-left:2px;
        }
        th.hall_room {
            width: 91px;
            height: 37px;
        }

        th.marks_details {
            width: 158px;
        }
        
        th.subject_fiels {
            width: 82px;
        }
      
        table {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #ddd;
        }
        table.schedule_table.table-bordered.mb-2 {
            width: 170%;
        }
        input.form-control.schedule_exam_marks_field.form-control-sm {
            width: 81px;
        }

        .table_area {
            padding-bottom: 87px;
        }

    {{-- Time picker Css --}}
    .prev.action-next {
        height: 4px;
        width: 4px;
        font-size: 4px;
    }
    
    .prev {
        background-size: 9px;
        height: px;
        padding: 8px;
    }

    input.timepicki-input {
        background: none repeat scroll 0 0 #FFFFFF;
        border: 1px solid #CCCCCC;
        border-radius: 5px 5px 5px 5px;
        float: none;
        margin: 0;
        text-align: center;
        width: 61%;
        font-size: 11px;
    }

    .next {
    background-position: 47% 150%;
    background-size: 9px;
    padding: 8px;
}

</style>
@if ($subjects->count() > 0)

<div class="text-left">
    <h6 style="color:black; border-bottom:1px solid;"><b>Subject Lists For Creating Schedule</b></h6>
</div>
<div style="overflow-x:scroll" class="table_area">

    <form id="create_schedule_from" method="post"
        action="{{ route('admin.exam.master.schedule.store') }}">
        @csrf
        <div class="hidden_fields">
            <input type="hidden" name="class_id" value="{{ $class_id }}">
            <input type="hidden" name="section_id" value="{{ $section_id }}">
            <input type="hidden" name="exam_id" value="{{ $exam->id }}">
        </div>
        <table id="dataTableExample1" class="schedule_table table table-striped table-bordered mb-2">
            <thead>
                <tr class="text-center">
                    <th class="subject_fiels">Subject</th>
                    <th class="date_fiel">Date</th>
                    <th class="time_fiels">Starting Time</th>
                    <th class="time_fiels">Ending Time</th>
                    <th class="hall_room">Hall Room</th>
                    @foreach (json_decode($exam->distributions) as $distribution)
                    <th class="marks_details">{{ $distribution }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>

                @foreach($subjects as $subject) 
                @php
                    $existsSchedule = DB::table('exam_schedules')
                    ->select(['date', 'starting_time', 'ending_time', 'exam_hall_id', 'distributions'])
                    ->where('class_id', $class_id)
                    ->where('exam_id', $exam->id)
                    ->where('section_id', $section_id)->where('subject_id', $subject->subject_id)->first();
                @endphp
                <tr class="text-center">
                    <input type="hidden" name="subject_ids[]" value="{{ $subject->subject_id }}">
                    <td title="{{$subject->subject->name }}" class="subject_fiels"><b> {{Str::limit($subject->subject->name, 15) }}</b></td>
                    <td class="date_fiel">
                        <input required type="text" autocomplete="off" autofocus placeholder="dd-mm-yy"  name="dates[]" class="form-control add_exam_date_picker form-control-sm schedule_date_field" value="{{ $existsSchedule ? $existsSchedule->date : ''  }}">
                    </td>
                    <td class="time_fiels">
                        <input required type="text" placeholder="00:00 pm/am" name="starting_times[]"
                        value="{{ $existsSchedule ? $existsSchedule->starting_time : ''  }}"  class="form-control form-control-sm time_picker">
                    </td>
                    <td class="time_fiels">
                        <input required type="text" placeholder="00:00 pm/am" name="ending_times[]" 
                        value="{{ $existsSchedule ? $existsSchedule->ending_time : ''  }}" class="form-control form-control-sm time_picker">
                    </td>
                    <td class="hall_room">
                        <select required name="hall_ids[]" class="form-control form-control-sm schedule_exam_hall_field">
                            <option value="">Hall</option>
                            @foreach ($halls as $hall)
                                <option
                                    @if ($existsSchedule)
                                        {{ $existsSchedule->exam_hall_id == $hall->id ? 'SELECTED' : '' }}
                                    @endif
                                 value="{{ $hall->id }}">
                                    {{ $hall->hall_no }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    @foreach (json_decode($exam->distributions) as $distribution)
                    <td class="marks_details">
                        <div class="row justify-content-center">
                            <div class="form-inline">
                                <input required type="text" placeholder="Full mark"
                                    class="form-control schedule_exam_marks_field form-control-sm" name="{{$distribution.'['.$subject->subject_id.']'.'[full_marks]'}}"
                                    value="{{ $existsSchedule ? json_decode($existsSchedule->distributions, true)[$loop->index][$distribution]['fullMarks'] : '' }}">
                            </div>
                            <div class="form-inline">
                                <input style="margin-left:0.30px;{{ count(json_decode($exam->distributions)) < 4 ? 'margin-left:2px;' : '' }} " required type="text" placeholder="Pass mark"
                                    class="form-control {{ count(json_decode($exam->distributions)) > 3 ? 'mt-1' : '' }} schedule_exam_marks_field  form-control-sm" name="{{$distribution.'['.$subject->subject_id.']'.'[pass_marks]'}}"
                                     value="{{ $existsSchedule ? json_decode($existsSchedule->distributions, true)[$loop->index][$distribution]['passMarks'] : '' }}">
                            </div>
                        </div>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" class="btn float-right create_button my-1 mr-1 btn-sm btn-blue" value="Save schedule">
        <input type="button" class="btn float-right loading_button my-1 mr-1 btn-sm btn-blue" value="Loading...">
    </form>
</div>
@else
<span class="alert alert-danger d-block">No Subject available in this class section</span>
@endif

<script>
    $(document).ready(function(){
        $('.loading_button').hide();
        $('.add_exam_date_picker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose:true
        });
    })
    $(document).ready(function(){
        $('.time_picker').timepicki({
            show_meridian:true
        }); 
    });
</script>

