<form class="form-horizontal" action="{{ route('admin.attachment.upload.content.update', $uploadContent->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Title :</label>
            <input type="text" value="{{ $uploadContent->title }}" class="form-control form-control-sm" placeholder="Attachment title" name="etitle" required>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <label  class="col-form-label text-right m-0 p-0">Type :</label>
            <select required name="etype" class="form-control form-control-sm">
                <option value="">Select type</option>
                @foreach ($types as $type)
                <option {{ $uploadContent->type_id == $type->id ? 'SELECTED' : '' }} value="{{ $type->id }}"> {{ $type->name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <div class="checkbox_border">
                <label class="chech_container available_for_all_class mt-1">
                    <input {{ $uploadContent->class_id ? '' : 'CHECKED' }} type="checkbox" name="available_for_all_class" class="checkbox"
                        value="available_for_all_class">
                    <b><span>Available For All Class</span></b> 
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>
    <div style="" id="classes" class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Class :</label>
            <select required name="eclass_id" class="form-control eclass_id form-control-sm">
                <option value="">Select class</option>
                @foreach ($classes as $class)
                <option {{  $uploadContent->class_id ? 'SELECTED' : '' }} value="{{ $class->id }}"> {{ $class->name }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div style="" id="subject_checkbox" class="form-group row">
        <div class="col-sm-12">
            <div class="checkbox_border">
                <label class="chech_container available_for_all_class mt-1">
                    <input {{ $uploadContent->subject_id ? '' : 'CHECKED' }} type="checkbox" name="not_according_to_subject" class="checkbox2"
                        value="not_according_to_subject">
                        <b><span>Not According Subject</span></b> 
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>

    <div style="" id="subjects" class="form-group row">
        
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Subject :</label>
            <select required name="esubject_id" class="form-control esubject_id form-control-sm">
                <option value="">Select subject</option>
                @foreach ($subjects as $subject)
                    <option {{ $uploadContent->subject_id == $subject->id ? 'SELECTED' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Publish Date :</label>
            <input type="text" value="{{ $uploadContent->publish_date }}" autocomplete="off" class="form-control form-control-sm add_in_date_picker" value="" name="epublish_date" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Remarks (Optional) :</label>
            <input name="enote" value="{{ $uploadContent->note }}" type="text" placeholder="Remarks" class="form-control form-control-sm">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-sm-12">
            <label class="col-form-label text-right m-0 p-0">Attachment File :</label>
            <input required accept=".jpg, .jpeg, .png, .gif, .txt, .csv, .xlsx" type="file" id="photo" name="eattachment_file" id="input-file-now"
                class="form-control dropify" size="20" required/>
        </div>
    </div>

    <div class="form-group pt-2 text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
        @if (json_decode($userPermits->attachment_book_module, true)['upload_content']['edit'] == 1)
            <button type="submit" class="btn btn-sm btn-blue">Submit</button>
        @endif
        
    </div>
</form>

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
