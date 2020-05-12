@extends('admin.master')
@push('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css'>
    <style>
        .inbox-date {
            top: 8px!important;
        }
        a.inbox_item.unread {
            display: inline-block;
            border: none;
        }
        .mailbox_inner .i-check {
            z-index: 1;
            line-height: 65px;
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
                                        <li><a href="{{ route('admin.communication.message.inbox') }}"><i class="fa fa-inbox"></i><span
                                                    class="pl-2">Inbox</span><small
                                                    class="float-right label p-1 rounded bg-dark text-white">{{ $countContract }}</small></a>
                                        </li>
                                        <li><a href="{{ route('admin.communication.message.send.mail.section') }}"><i class="far fa-paper-plane"></i><span
                                                    class="pl-2">Send Mail</span></a></li>
                                        <li class="active"><a href="{{ route('admin.communication.message.draft.mail.section') }}"><i
                                                    class="fa fa-archive"></i><span
                                                    class="pl-2">Drafts</span></a></li>
                                        <li><a href="{{ route('admin.communication.message.mail.trashes') }}"><i class="fa fa-trash"></i><span
                                                    class="pl-2">Tresh</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="p-0 inbox-mail">
                            <div class="mailbox-content">
                                @foreach ($draftMails as $draftMail)
                                    
                                <div class="mailbox_inner">
                                    {{--  <div class="i-check mail-check">
                                        <div class="pl-0 checkbox checkbox-success">
                                            <input id="mailid1" type="checkbox">
                                            <label for="mailid1"></label>
                                        </div>
                                    </div>  --}}
                                    <a class="inbox_item unread">
                                        <div class="inbox-avatar">
                                            <img src="{{asset('public/admins/images/user1.jpg')}}" alt="img">
                                            <div class="inbox-avatar-text">
                                                <div class="avatar-name">{{ $draftMail->email }}</div>
                                                <div>
                                                    <small>
                                                        <span>
                                                            <strong>Subject : </strong>
                                                            <span> {{ $draftMail->subject }} </span>
                                                        </span>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="inbox-date mt-1 d-none d-lg-block">
                                                    
                                                        @if ($draftMail->is_bulk_mail == 1)
                                                            <div style="font-weight: 100!important;" class="badge badge-primary p-1 px-2 mr-3">Bulk mail draft</div>   
                                                        @endif

                                                        @if ($draftMail->is_replay_mail == 1)
                                                        <div style="font-weight: 100!important;" class="badge badge-primary p-1 px-2 mr-3" >Reply mail draft</div> 
                                                        @endif

                                                        @if ($draftMail->is_send_mail == 1)
                                                        <div style="font-weight: 100!important;" class="badge badge-primary p-1 px-2 mr-3" >Send mail draft</div> 
                                                        @endif

                                                        @if ($draftMail->is_send_mail == 1)
                                                        <a data-id="{{$draftMail->id}}" href="#" class="btn btn-sm btn-blue drafted_send_mail_btn">Forword</a>
                                                        <a  href="{{ route('admin.communication.message.draft.mail.delete',$draftMail->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a>  
                                                        @endif

                                                        @if ($draftMail->is_replay_mail == 1)
                                                        <a data-id="{{$draftMail->id}}" href="#" class="btn btn-sm btn-blue drafted_reply_mail_send_btn">Forword</a> 
                                                        <a  href="{{ route('admin.communication.message.draft.mail.delete',$draftMail->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                        @endif

                                                        @if ($draftMail->is_bulk_mail == 1)
                                                        <a  href="{{ route('admin.communication.message.drafted.bulk.mail',$draftMail->id) }}" class="btn btn-sm btn-blue">Forword</a> 
                                                        <a  href="{{ route('admin.communication.message.draft.mail.delete',$draftMail->id) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></a> 
                                                        @endif
                                                            
                                                    
                                                    <br>  
                                                <div><small>{{ $draftMail->created_at }}</small></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach    
                            </div>

                            <div class="d-flex justify-content-end m-2">
                                {{ $draftMails->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade bd-example-modal-lg" id="DraftmailReplyModal">
    
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Drafted Reply Mail</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{ route('admin.communication.message.send.draft.mail.reply') }}" method="POST">
                            @csrf
                            <input type="hidden" class="contract_id" name="contract_id">
                            <input type="hidden" class="draft_id" name="draft_id">
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Mail Reply To : </label>
                                    <input readonly type="text" class="form-control draft_reply_email" name="draft_reply_email" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Subject : </label>
                                    <input type="text" class="form-control draft_reply_mail_subject" placeholder="Reply mail subject" name="draft_reply_mail_subject" required>
                                </div>

                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                        <label for="inputEmail3" class="no-gutters col-form-label  text-right"> Details : </label>
                                    <textarea  name="draft_reply_mail_body" id="" placeholder="Reply mail details" class="draft_reply_mail_body summernote" cols="30" rows="10"></textarea>
                                </div>

                            </div>
        
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                                <button type="submit" name="action" value="save_to_draft" class="btn save_to_draft btn-sm btn-blue ">Save To Draft</button>
                                <button type="submit" name="action" value="send" class="btn btn-sm btn-blue">Send</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    

    <div class="modal fade bd-example-modal-lg" id="sendDraftmailModal">
    
            <div class="modal-dialog">
                <div class="modal-content">
        
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Drafted Send Mail</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="form-horizontal" action="{{ route('admin.communication.message.send.draft.send.mail') }}" method="POST">
                            @csrf
                            <input type="hidden" class="send_draft_id" name="send_draft_id">
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Mail Reply To : </label>
                                    <input type="text" class="form-control draft_send_email" name="draft_send_email" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                    <label for="inputEmail3" class="no-gutters col-form-label text-right">Subject : </label>
                                    <input type="text" class="form-control  draft_send_mail_subject" placeholder="Reply mail subject" name="draft_send_mail_subject" required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                
                                <div class="col-sm-12">
                                        <label for="inputEmail3" class="no-gutters col-form-label  text-right"> Details : </label>
                                    <textarea name="draft_send_mail_body" placeholder="Reply mail details" class="summernote draft_send_mail_body"></textarea>
                                </div>

                            </div>
        
                            <div class="form-group text-right">
                                
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal" aria-label=""> Close</button>
                                <button type="submit" name="action" value="save_to_draft" class="btn save_to_draft btn-sm btn-blue ">Save To Draft</button>
                                <button type="submit" name="action" value="send" class="btn btn-sm btn-blue">Send</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection

@push('js')

    <script>

        $(document).ready(function(){
           
            $(document).on('click','.drafted_reply_mail_send_btn',function(){
              
                var drartId = $(this).data('id');
                if (drartId) {
                    $.ajax({
                        url: "{{ url('admin/communication/message/via/email/get/draft/mail/details/') }}/" + drartId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $(".contract_id").val(data.contract_id);
                            $(".draft_id").val(data.id);
                            
                            $(".draft_reply_email").val(data.email);
                            $(".draft_reply_mail_subject").val(data.subject);
                            //$(".draft_reply_mail_body").val(data.body);
                            $(".note-editable p").html(data.body);
                            $("#DraftmailReplyModal").modal('show');
                        
                        }
                    });
                } else {
                    alert('danger');
                }
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.drafted_send_mail_btn', function(){
       
                var drartId = $(this).data('id');
                if (drartId) {
                    $.ajax({
                        url: "{{ url('admin/communication/message/via/email/get/draft/mail/details/') }}/" + drartId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $(".send_draft_id").val(data.id);
                            $(".draft_send_email").val(data.email);
                            $(".draft_send_mail_subject").val(data.subject);
                            //$(".draft_send_mail_body").val(data.body);
                            $(".note-editable p").html(data.body);
                            $("#sendDraftmailModal").modal('show');
                        
                        }
                    });
                } else {
                    alert('danger');
                }
            })

          
        });
    </script>
   
    <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js'></script>

    <script>
	
        $(function () {
        
            /* Summernote Validation */
            var summernoteElement = $('.summernote');
                
            summernoteElement.summernote({
                height: 200,
                callbacks: {
                    onChange: function (contents, $editable) {
                        // Note that at this point, the value of the `textarea` is not the same as the one
                        // you entered into the summernote editor, so you have to set it yourself to make
                        // the validation consistent and in sync with the value.
                        summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);
        
                        // You should re-validate your element after change, because the plugin will have
                        // no way to know that the value of your `textarea` has been changed if the change
                        // was done programmatically.
                    
                    }
                }
            });
        
        });

    </script>
    


@endpush