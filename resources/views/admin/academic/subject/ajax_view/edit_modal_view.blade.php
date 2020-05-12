<form class="form-horizontal" action="{{ route('admin.academic.subject.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label for=""> <b>Subjcet Name</b> :</label>
            <input  type="text" class="form-control" id="name"  value="{{ $subject->name }}" name="name" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-6">
            <b>Subject Type :</b> <br>
            <input type="radio" {{ $subject->type == 1 ? 'CHECKED' : '' }} value="1" class="mr-1" name="type" required> Theory &ensp;
            <input type="radio" {{ $subject->type == 2 ? 'CHECKED' : '' }} value="2" class="mr-1" name="type" required> Practical 
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="code"><b>Subject Code</b>: </label>
            <input  type="text" class="form-control" id="code"  value="{{ $subject->code }}" name="code" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-sm btn-blue">Update</button>
    </div>
</form>



