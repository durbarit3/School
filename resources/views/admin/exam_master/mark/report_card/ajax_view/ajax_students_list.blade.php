@if ($students->count() > 0)
    
        <div class="text-left">
            <h6 style="color:black; border-bottom:1px solid;"><b>Check exam report card student wise</b></h6>
        </div>
        <div class="table_area">

            <form id="multiple_print_from" method="post" action="{{ route('admin.exam.master.report.card.multiple.print') }}">
                @csrf
                <div class="hidden_fields">
                    <input type="hidden" name="class_id" value="{{ $class_id }}">
                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                    <input type="hidden" name="exam_id" value="{{ $exam_id }}">
                </div>
                <div class="row">
                    <div class="multiple_print_button_area py-2 ml-3 w-100">
                        <button class="btn btn-sm btn-blue float-left" type="submit"><i class="fas fa-print"></i>&nbsp;Print selected all</button>
                    </div>
                </div>
                <table id="dataTableExample1" class="table table-striped table-bordered mb-2">
                   
                    <thead>
                        <tr class="text-center">
                            <th>
                                <label class="chech_container mb-4 ml-1 p-0">
                                    <input type="checkbox" id="check_all">
                                    <span class="checkmark"></span>
                                </label>
                            </th>
                            <th colspan="1">Student</th>
                            <th>Admission No</th>
                            <th>Roll</th>
                            <th>Category</th>
                            <th>Gender</th>
                            <th>Mobile No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach($students as $student)
                            
                            <tr  class="text-center">
                                <td width="50">
                                    <label class="chech_container mb-4 ml-1">
                                        <input type="checkbox" name="student_ids[]" class="checkbox"
                                            value="{{ $student->id }}">
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td> {{ $student->first_name.' '.$student->last_name }}</td>
                                <td>{{ $student->admission_no }}</td>
                                <td>{{ $student->roll_no }}</td>
                                <td>{{ $student->Category->name }}</td>
                                <td>{{ $student->Gender->name }}</td>                           
                                <td>{{ $student->student_mobile }}</td>                           
                                <td>
                                    <a class="btn btn-sm btn-info show_report_card" 
                                    href="{{ url('admin/exam/master/mark/report/card/details'.'/'.$class_id.'/'.$section_id.'/'.$exam_id.'/'.$student->id) }}" title="Check Report Cart">
                                    <i class="fas fa-eye"></i>
                                </a>
                                </td>                           
                            </tr>

                        @endforeach

                    </tbody>
                </table>
                {{-- <input type="submit" class="btn float-right create_button my-1 mr-1 btn-sm btn-blue" value="Save">
                <input type="button" class="btn float-right loading_button my-1 mr-1 btn-sm btn-blue" value="Loading..."> --}}
            </form>
        </div>
@else
    <span class="alert alert-danger d-block">There is no student in this class section</span>
@endif
<script>
    {{-- $(document).ready(function () {
        $('.loading_button').hide();
    }) --}}
    $(document).ready(function () {

        $('#check_all').on('click', function (e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
    });
</script>
<script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
