@extends('admin.master')
@push('css')
    <style>
        .checkbox {
            position: absolute!important;
            z-index: 1!important;
            top: -6px!important;
        }
    </style>
@endpush
@section('content')

<div class="middle_content_wrapper">
    <section>
        <div class="mailbox">
            <div class="mailbox-header">
                <div class="row">
                    <div class="col-sm-4">
                            <div class="inbox-avatar">
                            @if (Auth::user()->avater)
                            <img src="{{asset('public/uploads/employee/'. Auth::user()->avater)}}" class="img-circle border-green" alt="img">
                            @else
                            <img  src="{{asset('public/uploads/employee/admin.jpg')}}" class="img-circle border-green" alt="img">
                            @endif
                            <div class="inbox-avatar-text">
                                <div class="avatar-name">{{ Auth::user()->adminname }}</div>
                                <div><small>Mailbox</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 float-right">
                        <div class="inbox-toolbar btn-toolbar text-right">
                            <div class="btn-group">
                                <a href="{{ route('admin.communication.message.bulk.mail.compose.section') }}" class="btn btn-sm btn-blue"><i class="far fa-edit"></i>
                                   Compose Bulk Mail</a>
                            </div>
                            <div class="btn-group ml-1">
                                    <a href="#"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('delete_form').submit();
                                    "
                                     class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i>
                                       Delete selected all</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 pr-md-0">
                    <div class="p-0 inbox-nav">
                        <div class="mailbox-sideber">
                            <div class="profile-usermenu">
                                <h6>Mailbox</h6>
                                <ul class="nav">
                                    <li class="active"><a href="{{ route('admin.communication.message.inbox') }}"><i
                                                class="fa fa-inbox"></i><span
                                                class="pl-2">Inbox</span><small
                                                class="float-right label p-1 rounded bg-dark text-white">{{ $contracts->count() }}</small></a>
                                    </li>
                                    <li><a href="{{ route('admin.communication.message.send.mail.section') }}"><i class="far fa-paper-plane"></i><span
                                                class="pl-2">Send Mail</span></a></li>
                                    <li><a href="{{ route('admin.communication.message.draft.mail.section') }}"><i class="fa fa-archive"></i><span
                                                class="pl-2">Drafts</span></a></li>
                                    <li><a href="{{ route('admin.communication.message.mail.trashes') }}"><i class="fa fa-trash"></i><span
                                                class="pl-2">Trash</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                    <form id="delete_form" action="{{ route('admin.communication.message.inbox.message.deleted') }}" method="post">
                    @csrf
                    <div class="p-0 inbox-mail">
                        @foreach ($contracts as $contract)
                            
                        
                            <div class="mailbox-content">
                                <div class="mailbox_inner">
                                    <div class="i-check mail-check">
                                        <div class="pl-0 checkbox checkbox-success">
                                            <input id="mailid1" type="checkbox" name="delete_mail_ids[]" value="{{ $contract->id }}">
                                            
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.communication.message.details', $contract->id) }}" class="inbox_item unread">
                                        <div class="inbox-avatar">
                                            <img src="{{asset('public/admins/images/user1.jpg')}}" alt="img">
                                            <div class="inbox-avatar-text">
                                                <div class="avatar-name">{{ $contract->name }}</div>
                                                <div>
                                                    <small>
                                                        <span>
                                                            <strong>Subject : </strong>
                                                            <span> {{ $contract->subject }}</span>
                                                        </span>
                                                    </small>
                                                   
                                                </div>
                                            </div>
                                            <div class="row">
                                                    
                                                <div class="inbox-date d-none d-lg-block">
                                                    
                                                        @if ($contract->is_seen == 0)
                                                        <div style="font-weight: 100!important;" class="badge badge-danger">Not Seen</div>
                                                        @else
                                                        <div style="font-weight: 100!important;" class="badge badge-success">Seen</div>
                                                        @endif

                                                        @if ($contract->is_replied == 0)
                                                        <div style="font-weight: 100!important;" class="badge badge-danger" >Not Replied</div> 
                                                        @else
                                                        <div style="font-weight: 100!important;" class="badge badge-success" > Replied</div>
                                                        @endif      
                                                    <div>
                                                        <small class=" text-dark">
                                                            {{ $contract->created_at->toDateTimeString() }}&ensp; | &ensp;{{ $contract->created_at->diffForHumans() }}
                                                            
                                                        </small>
                                                        
                                                    </div>
                                                </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        
                        @endforeach
                        <div class="d-flex justify-content-end m-2">
                            {{ $contracts->links() }}
                            {{--  <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>  --}}
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Exam Hall</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="" method="POST">
                    @csrf
                    <div class="form-group row justify-content-center">
                        <label for="inputEmail3" class="col-sm-3 no-gutters col-form-label text-right">Hall No : </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Hall number" name="hall_no" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <label for="inputEmail3" class="col-sm-3 no-gutters col-form-label text-right">Capacity : </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" placeholder="Capacity" name="sit_qty" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-sm btn-blue mr-4">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Exam Hall</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="hall_no" class="col-sm-3 col-form-label text-center">Hall No:</label>
                        <div class="col-sm-9 row justify-content-center">
                            <input type="text" class="form-control" name="hall_no" id="hall_no" required>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sit_qty" class="col-sm-3 col-form-label text-center">Capacity:</label>
                        <div class="col-sm-9 row justify-content-center">
                            <input type="text" class="form-control" name="sit_qty" id="sit_qty" required>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label="">Close</button>
                        <button type="submit" class="btn btn-sm btn-blue mr-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')

<script type="text/javascript">

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
<script type="text/javascript">

    $(document).ready(function () {
        $('.editcat').on('click', function () {
            var hallId = $(this).data('id');
            if (hallId) {
                $.ajax({
                    url: "{{ url('admin/exam/master/exam/halls/edit') }}/" + hallId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#hall_no").val(data.hall_no);
                        $("#sit_qty").val(data.sit_qty);
                        $("#id").val(data.id);
                    }
                });
            } else {
                alert('danger');
            }

        });
    });
</script>

<script>
@error('hall_no')
    toastr.error("{{ $errors->first('hall_no') }}");
@enderror
</script>
@endpush