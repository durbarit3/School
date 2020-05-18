
<div class="details_heading">
    <div class="exam_name text-center">
        <h6 style="color:black;"><b>Exam : {{ $examName }}</b></h6>
    </div>
    <div class="class_section_name text-center">
        <h6>Class : {{ $className }} ({{ $sectionName }})</h6>
    </div>
</div>

{{-- Print Page Header --}}
<div style="display:none;" class="print_page_heading_heading">
    <div class="exam_name text-center">
        <h4><b>XYZ High School</b></h4>
        <h6>Mirpur 1, Block: F, Dhaka</h6>
        <h6>Exam : {{ $examName }}</h6>
        <h6>Exam Schedule</h6>
    </div>
    <div class="class_section_name text-center">
        <h6>Class : {{ $className }} ({{ $sectionName }})</h6>
    </div>
</div>
{{-- Print Page Header End--}}

<div class="table_area table-responsive">
    <div class="printing_content">
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="text-center">
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Starting Time</th>
                    <th>Ending Time</th>
                    <th>Hall Room</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($examScheduleDetails as $examScheduleDetail)
                <tr class="text-center">
                    <td>{{ Str::limit($examScheduleDetail->subject->name, 15) }}</td>
                    <td>{{ $examScheduleDetail->date }}</td>
                    <td>{{ $examScheduleDetail->starting_time }}</td>
                    <td>{{ $examScheduleDetail->ending_time }}</td>
                    <td>{{ $examScheduleDetail->examHall->hall_no }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>