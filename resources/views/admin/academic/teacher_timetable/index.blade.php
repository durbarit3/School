@extends('admin.master')
@push('css')
  <style>

    .loading {
        margin: 0px;
        padding: 0px;
        background: white;
        padding-bottom: 1px;
    }
    
    .loading h4 {
        margin-left: 24px;
    }

    button {
        margin-top: 25px;
    }

    .day_area {
        width: 14%;
        height: auto;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
        line-height: 17px;
    }

    .day_grid {

        width: 14%;
        text-align: center;
        display: flex;
        flex-direction: column;
    }

    .time_list {
        font-size: 12px;
        font-weight: 600;
        box-sizing: border-box;
        margin: 4px;
        border: 1px solid;
        border-radius: 7px;
        background: #f7f7f7;
        color: #353c48;
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
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Select Criteria For Teacher Timetable</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form mt-2" action="{{ route('admin.academic.teacher.timetable.search') }}"
                            method="get">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 no-gutters">
                                    <label class=" p-0 m-0"><b>Select Teacher :</b> </label>
                                    <select required name="teacher_id" id="teacher_id" class="form-control form-control-sm">
                                        <option value="">Select teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->adminname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 no-gutters">
                                    <button type="submit" class="btn btn-sm btn-blue float-left">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="loading"><h4>Loading...</h4> </div>
                    <div class="panel_body mt-3 another_body time_table_list">
                                         
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
        $('.loading').hide();
        $('.another_body').hide();
        $('.search_form').on('submit', function (e) {
            e.preventDefault();
            $('.another_body').hide();
            $('.time_table_list').empty();
            $('.loading').show(100);
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var request = $(this).serialize(); 
            //console.log(request);
            $.ajax({
                url: url,
                type: method,
                data:request,
                success: function (data) {
                    //console.log(data);
                    if (!$.isEmptyObject(data)) {
                        $('.time_table_list').html(data);
                        $('.loading').hide(100);
                        $('.another_body').show();
                    }
                }
            })
        })
    });

</script>
@endpush