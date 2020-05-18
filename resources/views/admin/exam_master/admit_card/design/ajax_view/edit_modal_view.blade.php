    <style>
        .dropify-wrapper{
            max-height: 50px;
        }

        .dropify-wrapper.has-error .dropify-message .dropify-error, .dropify-wrapper.has-preview .dropify-clear {
            display: block;
            margin-top: -5px;
        }

        .dropify-wrapper .dropify-message {
            position: relative;
            top: 73%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

    </style>
    
<link href="{{asset('public/admins/plugins/icheck/skins/all.css')}}" rel="stylesheet">
<link href="{{asset('public/admins/plugins/bootstrap-toggle/bootstrap-toggle.min.css')}}" rel="stylesheet">


<form id="update_design_form" class="form-horizontal" action="{{ route('admin.exam.master.admit.card.design.update', $admitCardDesign->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Template Name (Must be unique)</b> :</label>
            <input required placeholder="Template Name" type="text" class="form-control form-control-sm" value="{{ $admitCardDesign->template_name }}" name="template_name">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Heading </b> :</label>
            <input type="text" class="form-control form-control-sm" value="{{ $admitCardDesign->heading }}" placeholder="Admin card heading" name="heading" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Title </b> :</label>
            <input type="text" class="form-control form-control-sm" value="{{ $admitCardDesign->title }}" placeholder="Admin card title" name="title" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Footer Text </b> :</label>
            <input type="text" class="form-control form-control-sm" value="{{ $admitCardDesign->footer_text }}" placeholder="Footer text" name="footer_text">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Left Logo </b> :</label>
            <input data-default-file="{{ asset('public/uploads/admit_card_logo/'.$admitCardDesign->left_logo) }}" accept=".jpg, .jpeg, .png, .gif" type="file" id="left_logo" name="left_logo" id="input-file-now"
                        class="form-control dropify" size="20"/>  
            <span class="uerror text-danger uleft_logo_error"></span>            
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Right Logo </b> :</label>
            <input data-default-file="{{ asset('public/uploads/admit_card_logo/'.$admitCardDesign->right_logo) }}"  accept=".jpg, .jpeg, .png, .gif" type="file" id="right_logo" placeholder="Right Logo" name="right_logo" id="input-file-now" class="form-control dropify" size="20"/>  
            <span class="uerror text-danger uright_logo_error"></span>
        </div>
    </div> 

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Background photo </b> :</label>
            <input data-default-file="{{ asset('public/uploads/admit_card_logo/'.$admitCardDesign->background_photo) }}"  accept=".jpg, .jpeg, .png, .gif" type="file" id="right_logo" placeholder="Background photo" name="background_photo" id="input-file-now" class="form-control dropify" size="20"/>  
            <span class="uerror text-danger ubackground_photo_error"></span>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label p-0 m-0"><b>Student photo </b> :</label><br>
            <input type="checkbox" {{ $admitCardDesign->is_student_photo ? 'CHECKED' : '' }} name="is_student_photo" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
        </div>
    </div>

    <div class="form-group p-0 m-0 text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
        <button type="submit" class="btn btn-sm btn-blue">Submit</button>
    </div>
</form>


<script src="{{asset('public/admins/plugins/icheck/icheck.min.js')}}"></script>
<script src="{{asset('public/admins/plugins/icheck/icheck-active.js')}}"></script>
<script src="{{asset('public/admins/plugins/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>    