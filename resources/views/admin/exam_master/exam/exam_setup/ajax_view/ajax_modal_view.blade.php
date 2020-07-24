@php
    $examSchedule = DB::table('exam_schedules')->select('id')->where('exam_id', $exam->id)->first();
@endphp
<form id="edit_exam_setup_form" action="{{ route('admin.exam.master.exam.update', $exam->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Exam Name :</b>  </label>
                <input type="text" class="form-control" id="e_name"  value="{{ $exam->name }}" name="name" >
                <div class="error e_error_name"></div>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Exam Type :</b></label>
                <select class="form-control" name="type" id="e_type">
                    <option value="">Select Exam Type</option>
                    @foreach ($types as $type)
                    <option {{ $type->name == $exam->type ? 'SELECTED' : '' }} value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <div class="error e_error_type"></div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Exam Term :</b></label>
                <select id="term_id" class="form-control" name="term_id" id="">
                    <option value="">Select Exam Term</option>
                    @foreach ($terms as $term)
                    <option {{ $term->id == $exam->exam_term_id ? 'SELECTED' : '' }} value="{{ $term->id }}">{{ $term->name }}</option>
                    @endforeach
                </select>
                
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Start Date:</b> </label>
                <input readonly id="e_start_date" type="text" class="form-control readonly_field edit_exam_date_picker" value="{{$exam->starting_date}}" name="start_date">
                <div class="error e_error_start_date"></div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Start Date :</b></label>
                <input readonly type="text" id="e_end_date" class="form-control readonly_field edit_exam_date_picker" value="{{$exam->ending_date}}" name="end_date" required>
                <div class="error e_error_end_date"></div>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label><b>Distributions :</b></label>
                <select {{ $examSchedule ? 'disabled' : '' }}  name="distributions[]" class="edit_distributions_select" multiple="multiple" id="edit_distributions_select" data-placeholder="Destributions" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option value="">Select Exam Term</option>
                    @foreach ($distributions as $distribution)
                        <option  
                            @foreach (json_decode($exam->distributions) as $examDistribution)
                                {{  $examDistribution ===  $distribution->name ? 'SELECTED' : '' }}
                            @endforeach
                            value="{{ $distribution->name }}">
                            {{ $distribution->name }}
                        </option>
                    @endforeach
                </select>
                @if ($examSchedule)
                <small style="    margin: 0px;
                padding: 0px;
                font-size: 11px;
                font-weight: 700;" class="text-danger">Your can not update this distributions field cause already exam shedule is added in this exam !</small>
                @endif
                <div class="error e_error_distributions"></div>
            </div>
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
            <button type="button" class="btn btn-sm btn-blue loading_button">Loading...</button>
            @if (json_decode($userPermits->exam_module,true)['exam']['exam_setup']['edit'] == 1)
                <button type="submit" class="btn btn-sm submit_button btn-blue">Update</button>
            @endif
        </div>
    </form>
    

    <script>
        $(document).ready(function(){
            $('.loading_button').hide();
            $('.edit_exam_date_picker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose:true
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
           //Initialize Select2 Elements
           $('#edit_distributions_select').select2()
            //Initialize Select2 Elements
        });
    </script>