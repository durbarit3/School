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
                            <div class="btn-group">
                                    <a href="#"
                                    onclick="
                                        event.preventDefault();
                                        document.getElementById('delete_form').submit();
                                    "
                                     class="btn btn-sm btn-danger ml-1"><i class="far fa-trash-alt"></i>
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
                                    <li><a href="{{ route('admin.communication.message.inbox') }}"><i class="fa fa-inbox"></i><span
                                                class="pl-2">Inbox</span><small
                                                class="float-right label p-1 rounded bg-dark text-white">{{ $countContract }}</small></a>
                                    </li>
                                    <li><a href="{{ route('admin.communication.message.send.mail.section') }}"><i class="far fa-paper-plane"></i><span
                                                class="pl-2">Send Mail</span></a></li>
                                    <li><a href="{{ route('admin.communication.message.draft.mail.section') }}"><i class="fa fa-archive"></i><span
                                                class="pl-2">Drafts</span></a></li>
                                    <li class="active"><a href="{{ route('admin.communication.message.mail.trashes') }}"><i class="fa fa-trash"></i><span
                                                class="pl-2">Trash</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                    <div class="p-0 inbox-mail">
                        <form id="delete_form" method="post" action="{{ route('admin.communication.message.trash.mail.delete') }}">
                            @csrf
                        <div class="mailbox-content">

                        @foreach ($mailTrashes as $mailTrash)
                            <div class="mailbox_inner">
                                <div class="i-check mail-check">
                                    <div class="pl-0 checkbox checkbox-success">
                                        <input id="mailid1" name="mail_trash_ids" value="{{ $mailTrash->id }}" type="checkbox">
                                        <label for="mailid1"></label>
                                    </div>
                                </div>
                                <a href="maildetails.html" class="inbox_item unread">
                                    <div class="inbox-avatar">
                                        <img src="{{asset('public/admins/images/user1.jpg')}}" alt="img">
                                        <div class="inbox-avatar-text">
                                            <div class="avatar-name">{{ $mailTrash->email ? $mailTrash->email : '' }}</div>
                                            <div>
                                                <small>
                                                    <span>
                                                        <strong>Subject: </strong>
                                                        <span>{{ $mailTrash->subject }}</span>
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="inbox-date d-none d-lg-block">
                                            <a href="{{ route('admin.communication.message.refactor.trash.mail', $mailTrash->id) }}" class="btn btn-sm btn-info mt-1">Refactor</a>
                                            <div><small>{{ $mailTrash->deleted_at }}</small></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                        </form>
                        <div class="d-flex justify-content-end m-2">
                            {!! $mailTrashes->links() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection