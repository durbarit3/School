@extends('admin.master')
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
                                    <a href="{{ route('admin.communication.message.bulk.mail.compose.section') }}" class="btn btn-blue"><i class="far fa-edit"></i>
                                       Compose Bulk Mail</a>
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
                                        <li class="active"><a href="{{ route('admin.communication.message.inbox') }}"><i class="fa fa-inbox"></i><span
                                                    class="pl-2">Inbox</span><small
                                                    class="float-right label p-1 rounded bg-dark text-white">{{ $countContract }}</small></a>
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
                        <div class="inbox-mail">
                            <div class="inbox-avatar p-3 border-top-0 border-left-0 border-right-0 border">
                                <img src="assets/images/avatar2.png" class="border-green hidden-xs hidden-sm"
                                    alt="img">
                                <div class="inbox-avatar-text">
                                    <div class="avatar-name"><strong>From: </strong>
                                        {{ $contract->name }} - <em>{{ $contract->email }}</em>
                                    </div>
                                    <div><small><strong>Subject: </strong> {{ $contract->subject }}</small></div>
                                </div>
                                <div class=" text-right">
                                    <div><span class="bg-green badge"><small>OPPORTUNITIES</small></span></div>
                                    <div><small>{{ $contract->created_at }}</small></div>
                                </div>
                            </div>
                            <div class="inbox-mail-details fs-13 p-3">
                                <p>{{ $contract->body }}</p>
                            
                                <hr>
                                @if ($contract->attachment)
                                    <h4> <i class="fa fa-paperclip"></i> Attachments <span>(3)</span> </h4>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <a href="#" class="m-1 d-block"><img class="img-thumbnail img-fluid"
                                                    alt="attachment" src="{{ asset('public/uploads/mail_attachment/'.$contract->attachment) }}"> </a>
                                        </div>
                                    
                                    </div>
                                @endif
                                

                                <div class="mt-2 border p-1 text-right">
                                    <p class="mr-1 pt-2 fs-13">click here to <a data-id="{{$contract->id}}" data-email="{{$contract->email}}" class="btn btn-sm btn-blue reply_button" data-toggle="modal" data-target="#mailReplyModal"  href="#">Reply</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

<div class="modal fade bd-example-modal-lg" id="mailReplyModal">
    
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Reply Mail Form</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{ route('admin.communication.message.send.reply') }}" method="POST">
                            @csrf
                            <input type="hidden" class="id" name="id">
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Mail Reply To : </label>
                                    <input readonly type="text" class="form-control repling_email" name="reply_email" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Subject : </label>
                                    <input type="text" class="form-control" placeholder="Reply mail subject" name="reply_mail_subject" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                        <label for="inputEmail3" class="no-gutters col-form-label text-right"> Details : </label>
                                    <textarea name="reply_mail_body" id="" placeholder="Reply mail details" class="form-control" cols="30" rows="10"></textarea>
                                </div>

                            </div>
        
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                                <button type="submit" name="action" value="save_to_draft" class="btn btn-sm btn-blue ">Save To Draft</button>
                                <button type="submit" name="action" value="send" class="btn btn-sm btn-blue">Send</button>
                                
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
            $('.reply_button').on('click', function () {
                var id = $(this).data('id');
                var email = $(this).data('email');
                $('.repling_email').val(email);
                $('.id').val(id);
    
            });
        });
    </script>
    @endpush