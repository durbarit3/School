@extends('admin.master')
@push('css')
    <style>
        .header_modal {
            padding: 5px!important;
        }
        .pay_slip_modal_header {
            padding: 5px!important;
        }

        .pay_slip_modal_header h4{
            font-size: 13px;
        }
        .header_modal h4 {
            font-size: 13px;
        }
        @media (min-width: 576px){

            .salary_generate_modal_dialog {
                max-width: 1075px!important;
                margin: 1.75rem auto;
            }
            
            .pay_slip_modal_dialog {
                max-width: 900px!important;
                margin: 1.75rem auto;
            }
  
        }

        .add_earns_area {
            padding: 3px;
            border: 1px solid lightgray;
            height: 300px;
            overflow: scroll;
        } 
        
        .add_deduction_area {
            padding: 3px;
            border: 1px solid lightgray;
            height: 300px;
            overflow: scroll;
        }

        .heading_area {
            border-bottom: 1px solid gray;
            margin-bottom: 6px;
        }

        .earn_field_remove_button {
            position: absolute;
            right: 6%;
        }

        .deduction_field_remove_button{
            position: absolute;
            right: 6%;
        }

        .remove_button {
            background: crimson;
            padding: 3px 4px;
            border-radius: 4px;
        }  

        .add_more_earn_button {
            background: gray;
            padding: 0px 8px;
            border-radius: 4px;
            margin-bottom: 2px;
            font-size: 21px;
            color: black;
        }
        
        .add_more_deduction_button {
            background: gray;
            padding: 0px 8px;
            border-radius: 4px;
            margin-bottom: 2px;
            font-size: 21px;
            color: black;
        }

        .heading_area h6 {
            font-size: 13px;
            margin-top: 5px;
        }

        .earn_table_area table tbody tr td {
            line-height: 8px;
            color: black;
        }
        .deduction_table_area table tbody tr td {
            line-height: 8px;
            color: black;
        }
        
        .earn_and_deduction_area table tbody tr td {
            line-height: 11px;
        }

        .modal-header .print_button {
            padding: 0px 6px;
            outline: none;
            border-radius: 7px;
            border-style: none;
            border: 1px solid lightgray;
            color: black!important;
            background: white;
            font-size: 14px;
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
                                    <span class="panel_icon"><i class="fas fa-border-all"></i></span>
                                    <span>Search A Students</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="panel_title">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel_body">
                        <form class="search_form" action="{{ route('admin.fees.students.collection.search') }}"
                            method="post">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Class :</b> </label>
                                    <select required  class="form-control form-control-sm" id="std_class" name="std_class">
                                        <option value="" selected="" disabled="">--- Select Class ---</option>
                                        
                                             @foreach($classes as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                              @endforeach
                                        
                                    </select>
                                </div>


                                <div class="col-md-6">
                                    <label class="m-0 p-0"><b>Section :</b> </label>
                                    <select required class="form-control form-control-sm" id="section_id" name="std_section">
                                        <option selected="" disabled="">Select A Section Name</option>
                                        
                                             
                                        
                                    </select>
                                </div>

                               
                                
                            </div>
                            <button type="submit" class="btn btn-sm btn-blue float-right mt-2">Search</button>
                        </form>
                    </div>

@isset($students )

                     <div class="panel_body table_body mt-3">
                        
                        
                        <div  class="table_area">
                             <div class="table-responsive">
                <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th> Class </th>
                            <th> Section </th>
                            <th> Admission No </th>
                            <th> Student Name </th>
                            <th> Father Name </th>
                            <th> Date of Birth </th>
                            <th> Gurdian phone </th>
                            <th> Price </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                   

                   @foreach($students as $row)

                        <tr>
                            <td>
                                <label class="chech_container mb-4">
                                    <input type="checkbox" name="deleteId[]" class="checkbox" value="">
                                    <span class="checkmark"></span>
                                </label>
                            </td>
                            <td>{{$row->classes->name ?? ''}}</td>
                            <td>{{$row->Section->name ?? ''}}</td> 
                            <td>{{$row->admission_no}}</td>
                            
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->father_name }}</td>
                            <td>{{ $row->date_of_birth }}</td>
                            <td>{{ $row->guardian_phone }}</td>
                            <td>
                                
                               dsafdsfdsf
                                
                            </td>
             
                            <td>
                                | <a href="{{route('admin.fees.collection',$row->id)}}" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                            </td>
                        </tr>
                        @endforeach

               
                       

                    </tbody>
                </table>
            </div>
                        </div>
                    </div>


                </div>
                @endisset
            </div>
        </div>
    </section>


</div>

@endsection
@push('js')
    <script src="{{ asset('public/admins/plugins/print_this/printThis.js') }}"></script>



    <script type="text/javascript">
    $(document).ready(function() {
        $('#std_class').on('change', function() {
            var id = $(this).val();
            
            
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/fees/collect/search/') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                    $('#section_id').empty();
                                        $('#section_id').append(' <option value="0">--Please Select Your Section--</option>');
                                        $.each(data,function(index,sectionobj){
                                            $.each(sectionobj.sections,function(index,section){
                                                 $('#section_id').append('<option value="' + section.id + '">'+section.name+'</option>');
                                            });
                                        });
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });
</script>


@endpush