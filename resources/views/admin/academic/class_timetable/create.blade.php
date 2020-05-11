@extends('admin.master')
@push('css')
<style>
    .panel_body.day_tab_area {
        padding-bottom: 106px;
    }

    .day_tab_area ul {
        display: block;
    }

    .day_tab_area ul li {
        display: inline-block;
        margin-left: 9px;
    }

    .day_tab_area a {
        display: block;
        padding: 0px 0px 0px 0px;
        color: white;

    }

    .day_tab_area a:hover {
      
        border-bottom: 1px solid white;

    }

    .tab_lists {
        border: 1px solid lightgray;
        padding: 4px 9px;
        margin-bottom: 2px;
        background: #353c48;
    }

   

    .active {
        border-bottom: 1px solid;
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
                                    <a href="{{ route('admin.class.timetable.search') }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-plus"></i></span>
                                        <span>Back</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form action="{{ route('admin.class.timetable.create') }}" method="get">
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
                            <button type="submit" class="btn btn-sm btn-blue search_button float-right mt-2">Search</button>
                        </form>
                    </div>

                    <div class="panel_body day_tab_area">
                        @if (isset($class_id) && isset($section_id))
                        <div class="tab_lists">
                            <div class="row">
                                <div class="col-md-10">
                                    <ul>
                                        <li><a class="active day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this); " href="#">Monday</a></li>
                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Tuesday</a></li>
                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Wednesday</a></li>
                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Thursday</a></li>

                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Friday</a></li>
                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Saturday</a></li>
                                        <li><a class="day" onclick="event.preventDefault();getData({{$class_id}},{{$section_id}},this);" href="#">Sunday</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-2">
                                    <button onclick="addMore({{ $class_id }}, {{ $section_id }})"class="btn btn-sm btn-info float-right">Add more</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab_body mt-2">
                            <form id="timetable_add_form" action="{{ route('admin.class.timetable.store') }}" method="POST">
                                @csrf
                                <div style="display:none;" class="hidden_inputs">
                                    <input type="hidden" id="class_id" name="class_id" value="{{ $class_id }}">
                                    <input type="hidden" id="section_id" name="section_id" value="{{ $section_id }}">
                                    <input type="hidden" id="day" name="day" value="Monday">
                                </div>
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Subject</th>
                                            <th>Teacher</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room No</th>
                                        </tr>
                                    </thead>

                                    <tbody class="class_timetable_list">

                                    </tbody>
                                </table>
                                <button class="btn btn-sm btn-blue float-right" type="submit">Save <span class="button_day">Monday</span> Timebable</button>
                            </form>
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
                url: "{{ url('admin/academic/class/timetable/get/sections/by/') }}" + "/" + classId,
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

<script>
    function getData(classId, sectionId, day) {
         $('#day').val(day.text);
         //console.log(day.text);
         $('.button_day').text(day.text);
        $.ajax({
            url: "{{url('admin/academic/class/timetable/get/timetable/list/')}}" + "/" + classId + "/" + sectionId + "/" + day.text,
            type: 'get',
            success: function (data) {
                $('.class_timetable_list').empty();
                $('.class_timetable_list').append(data);
            }
        })
    }

    function getLists(classId, sectionId, day) {
        //console.log(day);
        $.ajax({
            url: "{{url('admin/academic/class/timetable/get/timetable/list/')}}" + "/" + classId + "/" + sectionId + "/" + day,
            type: 'get',
            success: function (data) {
                $('.class_timetable_list').empty();
                $('.class_timetable_list').append(data);
            }
        })
    }
    
    getLists({{ $class_id }}, {{ $section_id }}, 'Monday');
    
</script>

<script>
    function addMore(classId, sectionId) {
        $('.off_day_message').remove();
        $.ajax({
            url: "{{url('admin/academic/class/timetable/get/more/timetable/list/')}}" + "/" + classId + "/" + sectionId,
            type: 'get',
            success: function (data) {
                $('.class_timetable_list').append(data);
            }
        })
    }

    function deleteRow(row){
        $(row).closest('.new_list').remove();
    }
</script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#timetable_add_form').on('submit', function(e){
            e.preventDefault();
            var allDatas = $(this).serialize();
            //console.log(allDatas);
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var class_id = $('#class_id').val();
            var section_id = $('#section_id').val();
            var day = $('#day').val();
            var subject_ids = $('#suject_ids').val();
            var teacher_ids = $('#teacher_ids').val();
            var start_times = $('#start_times').val();
            var end_times = $('#end_times').val();
            var room_numbers = $('#room_numbers').val();
            $.ajax({
                url:url,
                type:method,
                data:allDatas,
                dataType:'json',
                success:function(data){
                    toastr.success(data);
                    $('.class_timetable_list').hide(200);
                    $('.class_timetable_list').show(200);
                    getLists(class_id , section_id , day);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function(){
        
        $('.day').on('click', function(){
            $('.class_timetable_list').hide(200);
            $('.class_timetable_list').show(200);
            $('.day').removeClass('active');
            $(this).addClass('active');
        })

    });


    function deleteTimeTableList(timetableId){
        var timetable_id = $(timetableId).data('id');
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var day = $('#day').val();
        swal({
            title: "Are you sure to delete this subject from this timetable list ?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                //$(timetableId).closest('.old_list').remove();
                $.ajax({
                    url:"{{url('admin/academic/class/timetable/list/single/delete/')}}"+"/"+timetable_id,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        toastr.success(data);
                        getLists(class_id , section_id , day);
                    }
                });
            } else {
                swal("Safe Data!");
            }
        })
   }

 
    $(document).ready(function(){
        $('.time_picker').timepicki(); 
    });


</script>

@endpush