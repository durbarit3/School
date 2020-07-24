
@extends('admin.master')
@push('css')
    <style>
        .loading {margin: 0px;padding: 0px;background: white;padding-bottom: 1px;}
        .loading h4 {margin-left: 24px;}
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
                                        <span>Select criteria for expanse search</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="panel_body form_field_body">
                            <form class="expanse_search_form pb-2" action="{{ route('admin.expanse.search.action') }}"
                                method="get">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="m-0">Search Type :</label>
                                        <select name="select_type" id="select_type"
                                            class="form-control form-control-sm select_section section_id">
                                            <option value="">--- Select Type ---</option>
                                            <option value="today">Today</option>
                                            <option value="this_week">This Week</option>
                                            <option value="last_week">Last Week</option>
                                            <option value="this_month">This Month</option>
                                            <option value="last_month">Last Month</option>
                                            <option value="this_year">This Year</option>
                                            <option value="last_year">Last Year</option>
                                            <option value="period">Period</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date From :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_from">
                                    </div>
                                    <div class="col-md-3 period_field_area">
                                        <label class="m-0">Date To :</label>
                                        <input type="text" class="form-control form-control-sm date_picker" placeholder="10/12/2020" value="{{ date('d-m-Y') }}" name="date_to">
                                    </div>
                                    <div class="col-md-2">
                                        <button style="margin-top: 26px;" type="submit" class="btn btn-sm btn-blue float-left">Search</button>
                                    </div>
                                </div>
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

    <script>

        $(document).ready(function () {
            $('.period_field_area').hide();
            $('.table_body').hide();
            $('.loading').hide();
            $(document).on('change', '#select_type',function(){
                var value = $(this).val();
                if(value === 'period'){
                    $('.period_field_area').show();
                }else{
                    $('.period_field_area').hide(); 
                }
            });
        });

    </script> 

    <script>
      
        $(document).ready(function () {

            $('.expanse_search_form').on('submit', function(e){
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

    <script>
        $(document).ready(function(){
            $('.date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>
  
@endpush