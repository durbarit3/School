@if ($students->count() > 0)
    @if ($checkExamSchedule)
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Add Marks Subject Wise</b></h6>
        </div>
        <div style="overflow-x:scroll" class="table_area">

            <form id="mark_entires_from" method="post" action="{{ route('admin.exam.master.mark.entire.store') }}">
                @csrf
                <div class="hidden_fields">
                    <input type="hidden" name="class_id" value="{{ $class_id }}">
                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                    <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                    <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                </div>
                <table class="schedule_table table table-striped table-bordered mb-2">
                    <thead>
                        <tr class="text-left">
                            <th colspan="1">Student</th>
                            <th>Admission No</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th width="50">IsAbsent</th>
                            @php
                                $existsSchedule = App\ExamSchedule::select(['distributions'])
                                ->where('class_id', $class_id)
                                ->where('exam_id', $exam_id)
                                ->where('section_id', $section_id)->where('subject_id', $subject_id)
                                ->first();
                                $scheduleDistributions = json_decode($existsSchedule->distributions, true);
                            @endphp

                            @foreach (json_decode($examDistributions->distributions) as $distribution)
                                @if ($scheduleDistributions[$loop->index][$distribution]['fullMarks'] != 0 &&
                                is_numeric($scheduleDistributions[$loop->index][$distribution]['fullMarks']))
                                    <th width="100">
                                        {{ $distribution }}({{ $scheduleDistributions[$loop->index][$distribution]['fullMarks'] }})
                                    </th>
                                @endif
                            @endforeach

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $index = 0;
                        @endphp
                        @foreach($students as $student)
                            @php
                            $existsMarks = App\MarkEntires::where('class_id', $class_id)
                            ->where('section_id', $section_id)->where('exam_id', $exam_id)
                            ->where('student_id', $student->id)->where('subject_id', $subject_id)
                            ->select(['mark_distributions', 'is_absent'])
                            ->first();
                            @endphp
                            <tr data-id="{{ $index }}" class="text-left">
                                <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                                <td> {{ $student->first_name.' '.$student->last_name }}</td>
                                <td>{{ $student->admission_no }}</td>
                                <td>{{ $student->roll_no }}</td>
                                <td>{{ $student->Class->name }}</td>
                                <td>{{ $student->Section->name }}</td>
                                <td width="50">
                                    @if ($existsMarks && $existsMarks->is_absent == 1)
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" checked name="is_absents[{{ $student->id }}]" class="checkbox"
                                                value="absent">
                                            <span class="checkmark"></span>
                                        </label>
                                    @else
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="is_absents[{{ $student->id }}]" class="checkbox"
                                                value="absent">
                                            <span class="checkmark"></span>
                                        </label>
                                    @endif
                                </td>

                                @if ($existsMarks && $existsMarks->is_absent !== 1)
                                    @foreach (json_decode($examDistributions->distributions) as $distribution)
                                    
                                        @if (json_decode($existsMarks->mark_distributions, true)[$loop->index][$distribution] !== 'N/A')
                                            <td width="100">
                                                <input type="text" class="form-control mark_input-{{$index}} form-control-sm"
                                                    name="{{$distribution.'['.$student->id.']'}}"
                                                    value="{{ json_decode($existsMarks->mark_distributions, true)[$loop->index][$distribution] }}" />
                                            </td> 
                                        @endif
                    
                                    @endforeach
                                
                                @elseif ($existsMarks && $existsMarks->is_absent == 1)
                                    @foreach (json_decode($examDistributions->distributions) as $distribution)
                                        @if ($scheduleDistributions[$loop->index][$distribution]['fullMarks'] != 0 &&
                                        is_numeric($scheduleDistributions[$loop->index][$distribution]['fullMarks']))
                                        <td width="100">
                                            <input type="text" readonly class="form-control mark_input-{{$index}} form-control-sm"
                                                name="{{$distribution.'['.$student->id.']'}}" value="" />
                                        </td>
                                        @endif
                                    @endforeach        
                                @else
                                    @foreach (json_decode($examDistributions->distributions) as $distribution)
                                        @if ($scheduleDistributions[$loop->index][$distribution]['fullMarks'] != 0 &&
                                        is_numeric($scheduleDistributions[$loop->index][$distribution]['fullMarks']))
                                            <td width="100">
                                                <input type="text" class="form-control mark_input-{{$index}} form-control-sm"
                                                    name="{{$distribution.'['.$student->id.']'}}" value="" />
                                            </td>
                                        @endif
                                    @endforeach
                                @endif
                            </tr>
                            @php
                                $index++;
                            @endphp
                        @endforeach

                    </tbody>
                </table>
                <input type="submit" class="btn float-right create_button my-1 mr-1 btn-sm btn-blue" value="Save">
                <input type="button" class="btn float-right loading_button my-1 mr-1 btn-sm btn-blue" value="Loading...">
            </form>
        </div>
    @else
        <span class="alert alert-danger d-block">There is no exam schedule exists in this class section of this exam</span>
    @endif
@else
    <span class="alert alert-danger d-block">There is no student in this class section</span>
@endif
<script>
    $(document).ready(function () {
        $('.loading_button').hide();
    })
    $(document).on('change', '.checkbox', function () {
        if ($(this).is(':checked', false)) {
            $(this).prop('checked', true);
            var id = $(this).closest('tr').data('id');
            $('.mark_input-' + '' + id).val('');
            $('.mark_input-' + '' + id).prop('readonly', true);
        } else {
            $(this).prop('readonly', false);
            var id = $(this).closest('tr').data('id');
            $('.mark_input-' + '' + id).prop('readonly', false);
        }
    })
</script>