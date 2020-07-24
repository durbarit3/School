<form id="edit_subject_form" action="{{ route('admin.academic.subject.update', $subject->id) }}" method="POST">
    @csrf
    <div class="form-group row">
        <div class="col-sm-12">
            <label for=""> <b>Subjcet Name</b> :</label>
            <input  type="text" class="form-control" id="e_name"  value="{{ $subject->name }}" name="name">
            <span class="error e_error_name"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <b>Subject Type :</b> <br>
            <div class="radio_input" id="e_type">
                <input type="radio" {{ $subject->type == 1 ? 'CHECKED' : '' }} value="1" class="mr-1" name="type" required> Theory &ensp;
                <input type="radio" {{ $subject->type == 2 ? 'CHECKED' : '' }} value="2" class="mr-1" name="type" required> Practical 
            </div>
            <span class="error e_error_type"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="code"><b>Subject Code</b>: </label>
            <input  type="text" class="form-control" id="e_code"  value="{{ $subject->code }}" name="code">
            <span class="error e_error_code"></span>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn loading_button btn-sm btn-blue">Loading...</button>            
        @if (json_decode($userPermits->academic_module,true)['subject']['edit'] == 1)
        <button type="submit" class="btn submit_button btn-sm btn-blue">Update</button>
        @endif 
    </div>
</form>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.loading_button').hide();
        });
    </script>



