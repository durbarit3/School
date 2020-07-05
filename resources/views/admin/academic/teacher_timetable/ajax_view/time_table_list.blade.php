<div class="timetable_list_area">
    <div class="text-left">
        <h6 style="color:black; border-bottom:1px solid;"><b>Class time table list of the teacher </b></h6>
    </div>
    <div class="row">
        <div class="day_grid">
            <div class="day_heading">
                <h6>Monday</h6>
            </div>
            @if ($mondayTimeLists->count() > 0)
            @foreach ($mondayTimeLists as $timetableList)
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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
            <div title="Subject : {{ $timetableList->subject->name }}" class="time_list">
                <p class="m-0 p-0">Subject : {{ Str::limit($timetableList->subject->name, 11) }}
                </p>
                <p class="m-0 p-0">Start time : {{ $timetableList->start_time }}</p>
                <p class="m-0 p-0">End time : {{ $timetableList->end_time }}</p>
                <p class="m-0 p-0">Class : {{ $timetableList->class->name }}</p>
                <p class="m-0 p-0">Room No : {{ $timetableList->room_no }}</p>
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