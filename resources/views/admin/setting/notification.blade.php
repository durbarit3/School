@extends('admin.master')
@section('content')
<style>
    .ml-10{
        padding-left: 10px;
    }
</style>
<section class="page_content">
    <!-- panel -->
    <div class="panel">
        <div class="panel_header">
        <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Notification Setting</span>
                        </div>
                    </div>
                   
                </div>
        </div>
        <form action="{{route('room.type.multidelete')}}" method="post">
            @csrf
        <div class="panel_body" style="margin:20px;">
       
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-2">
                    <thead>
                        <tr>
                          
                            <th>Event</th>
                            <th>Option</th>
                            <th>Sample Message </th>
                            <th>Action </th>
                        </tr>
                    </thead>
                    <tbody>

                   @foreach($notifications as $row)
                        <tr>
                          
                            <td width="15%">{{$row->event}}</td>
                            <td width="20%" class="pl-10">
                             
                                <b>Email: </b> &nbsp &nbsp  &nbsp  &nbsp <input class="form-check-input " type="checkbox" onclick="changeEmail(this)"  value="{{$row->id}}" name="admission_email" {{$row->email == 1?'checked':''}}>


                                <b>SMS: </b> &nbsp  &nbsp  &nbsp &nbsp <input class="form-check-input" type="checkbox" onclick="changeSms(this)" value="{{$row->id}}" name="admission_sms" {{$row->sms == 1?'checked':''}}>
  
                            </td>
                            <td width="55%">
                            {{$row->smg}}
                                
                            </td>
             
                            <td width="10%">
                                | <a class="edit_route btn btn-sm btn-blue text-white" data-id="{{$row->id}}" title="edit" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></a> 
                            </td>
                        </tr>

                    @endforeach
                        

                    </tbody>

                </table>

            </div>
         
        </div>
        </form>
        <!--/ panel body -->


    </div>
    <!--/ panel -->
</section>
<!--/ page content -->


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Massage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.session.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right">Massage:</label>
                        <div class="col-sm-8 mt-2">
                            <input type="hidden" id="id" name="id">
                            <textarea rows="3" class="form-control" id="msg" name="msg" require></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script type="text/javascript">
    $(document).ready(function() {
        $('.edit_route').on('click', function() {
            var id = $(this).data('id');
            
            
            if (id) {
                $.ajax({
                    url: "{{ url('admin/settings/notification/edit') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                        
                        $("#msg").val(data.smg);
                        $("#id").val(data.id);
                    }
                });
            } else {
                // alert('danger');
            }

        });
    });



    // change email notification

    function changeEmail(e) {
        console.log(e.value);
        var id = e.value;

        $.ajax({
                    url: "{{ url('admin/settings/notification/email/status') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                     toastr.success(data.successMsg);
                         
                    }
                });
    }


        // change SMS notification

    function changeSms(e) {
        console.log(e.value);
        var id = e.value;

        $.ajax({
                    url: "{{ url('admin/settings/notification/sms/status') }}/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {

                    toastr.success(data.successMsg);

                    }
                });
    }


</script>

@endpush