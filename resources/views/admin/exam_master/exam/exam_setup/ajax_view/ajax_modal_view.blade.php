@php
    $examSchedule = DB::table('exam_schedules')->select('id')->where('exam_id', $exam->id)->first();
@endphp
<form class="form-horizontal" action="{{ route('admin.exam.master.exam.update', $exam->id) }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="name"> Exam Name: </label>
                <input required type="text" class="form-control" id="name"  value="{{ $exam->name }}" name="name" required>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="type"> Exam Type: </label>
                <select required class="form-control" name="type" id="type">
                    <option value="">Select Exam Type</option>
                    @foreach ($types as $type)
                    <option {{ $type->name == $exam->type ? 'SELECTED' : '' }} value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="term_id"> Exam Term: </label>
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
                <label for="start_date">Start Date: </label>
                <input id="start_date" type="text" class="form-control edit_exam_date_picker" value="{{$exam->starting_date}}" name="start_date" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="end_date">Start Date: </label>
                <input type="text" id="end_date" class="form-control edit_exam_date_picker" value="{{$exam->ending_date}}" name="end_date" required>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-sm-12">
                <label for="distributions"> Distributions: </label>
                <select {{ $examSchedule ? 'disabled' : '' }}  name="distributions[]" class="edit_distributions_select" multiple="multiple" id="edit_distributions_select" data-placeholder="Destributions" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
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
               
            </div>
            
        </div>
    
        <div class="form-group text-right">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
            @if (json_decode($userPermits->exam_module,true)['exam']['exam_setup']['edit'] == 1)
                <button type="submit" class="btn btn-sm btn-blue">Update</button>
            @endif
        </div>
    </form>
    

    <script>
        $(document).ready(function(){
            $('.edit_exam_date_picker').datepicker();
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
           //Initialize Select2 Elements
           $('#edit_distributions_select').select2()
            //Initialize Select2 Elements
        });

    </script>