<form class="form-horizontal" action="{{ route('admin.academic.session.update', $session->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="form-group row">
        <div class="col-sm-12">
            <label class="m-0 p-0" for="name"><b>Section year</b> : </label>
            <input type="text" class="form-control" placeholder="Session year" name="session_year" value="{{$session->session_year}}" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-sm btn-blue">Update</button>
    </div>
</form>

