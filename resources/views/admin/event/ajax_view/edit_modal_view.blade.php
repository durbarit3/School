<form id="edit_event_form" class="form-horizontal" action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Event Title</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" placeholder="Enter event Title">	
        <span class="error title_error"></span>
    </div>

    <div class="form-group">
        <label>Venue</label>
        <input type="text" name="venue" id="venue" class="form-control" value="{{ $event->venue }}"  placeholder="Enter Venue">
        <span class="error venue_error"></span>
    </div>

    <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" id="description">{{ $event->description }}</textarea>
        <span class="error description_error"></span>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="date" name="date" id="date" value="{{ $event->date }}" class="form-control">
        <span class="error date_error"></span>
    </div>
    
    <div class="form-group">
        <label for="inputEmail3">Time</label>
        <input type="time" name="time" id="time" value="{{ $event->time }}" class="form-control">
        <span class="error time_error"></span>
    </div>

    <div class="form-group">
        <label>Event Banner</label>
        <input data-default-file="{{ asset('public/uploads/event/'.$event->image) }}" accept=".jpg, .jpeg, .png, .gif" type="file" id="banner" name="banner" id="input-file-now" class="form-control form-control-sm dropify" size="20"/>
        <span class="error pic_error"></span>
    </div>
    <button type="submit" class="btn submit_button float-right btn-blue">Update</button>
    <button type="button" class="btn loading_button float-right btn-blue">Loading...</button>
    <button type="button" class="btn modal_close_button mr-1 float-right btn-default" data-dismiss="modal" aria-label=""> Close</button>
    
</form>

<script>
    $(document).ready(function(){
        $('.loading_button').hide();
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