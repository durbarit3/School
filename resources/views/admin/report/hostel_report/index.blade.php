@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        .loading h4 {margin-left: -4px;display: block;margin-top: 4px;}
        td {line-height: 11px;}
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
                                <div class="col-md-12">
                                    <div class="panel_title">
                                        <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                        <span>Select criteria for hostel report</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel_body">

                            <form class="hostel_report_form" action="{{ route('admin.report.hostel.report') }}"
                                method="get">
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="m-0"><b>Class :</b> </label>
                                        <select required name="class_id" id="select_class" class="form-control form-control-sm">
                                            <option value="">Select class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="m-0"><b>Section :</b> </label>
                                        <select required name="section_id" id="sections" class="form-control form-control-sm">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="m-0"><b>Hostel name :</b></label>
                                        <select name="hostel_id" class="form-control form-control-sm">
                                            <option value="">Select hostel name</option>
                                            @foreach ($hostels as $hostel)
                                                <option value="{{ $hostel->id }}">{{ $hostel->hostel_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <button  type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                            </form>
                        </div>

                        <div class="panel_body table_body mt-3">
                            <div class="loading"><h4>Loading...</h4> </div>
                            <div class="table_area">
                                
                            </div>
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
            $('#select_class').on('change', function () {
                var classId = $(this).val();
                $.ajax({
                    url: "{{ url('admin/ajax/class/sections/') }}" + "/" + classId,
                    type: 'get',
                    dataType: 'json',
                    success: function (data) {
                        //console.log(data);
                        $('#sections').empty();
                        $('#sections').append(' <option value="">Select Section</option>');
                        $.each(data, function (key, val) {
                            $('#sections').append(' <option value="' + val.section_id + '">' + val.section.name + '</option>');
                        })
                    }
                })
            })
        });

    </script>

    <script>
      
        $(document).ready(function () {
            $('.loading').hide();
            $('.table_body').hide();
            $('.hostel_report_form').on('submit', function(e){
                e.preventDefault();
                $('.table_body').show();
                $('.table_area').empty();
                $('.loading').show(100);
                var url = $(this).attr('action');
                var type = $(this).attr('method');
                var request = $(this).serialize();
                $.ajax({
                    url:url,
                    type:type,
                    data: request,
                    success:function(data){
                        if (!$.isEmptyObject(data.error)) {
                            $('.table_body').show();
                            $('.loading').hide(100); 
                            toastr.error(data.error);
                            $('.table_body').hide();
                        }else{
                            $('.table_area').html(data); 
                            $('.loading').hide(100); 
                            $('.table_body').show();
                        }
                    },
                });
            });
        });

    </script>  
@endpush