
@if ($exams->count() > 0)

<div class="text-left">
<h6 style="color:black; border-bottom:1px solid;">
    <b>All Scheduled Exam Of Class {{ $className }} Of Section  {{ $sectionName }} </b>
</h6>
</div>
<div class=" table-responsive table_area">

<table class="table table-sm table-bordered mb-2">
    <thead>
        <tr class="text-center">
            <th class="subject_fiels">Serial</th>
            <th class="date_fiel">Exam Name</th>
            <th class="time_fiels">Year</th>
            <th class="time_fiels">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach($exams as $exam) 
        @php
        $scheduledExam = App\Exam::where('id', $exam->exam_id)->select(['id','year', 'name'])->first();
        @endphp
            <tr class="text-center">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $scheduledExam->name }}</td>
                <td>{{ $scheduledExam->year }}</td>
                <td>
                    
                    <a class="btn btn-sm btn-info details_schedule" 
                        href="{{ url('admin/exam/master/schedules/check/details'.'/'.$class_id.'/'.$section_id.'/'.$exam->exam_id) }}" >
                        <i class="fas fa-eye"></i>
                    </a> |
                    {{-- data-toggle="modal" data-target="#schedule_details" --}}
                    <a id="delete_class_schedule" class="btn btn-sm btn-danger" 
                        href="{{ url('admin/exam/master/schedules/check/delete'.'/'.$class_id.'/'.$section_id.'/'.$exam->exam_id) }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</div>
@else
<span class="alert alert-danger d-block">There is not any scheduled exam of {{ $className }} in section {{ $sectionName }}</span>
@endif
