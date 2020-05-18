@extends('admin.master')
@push('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css'>
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
                                    <li class="active"><a href="{{ route('admin.communication.message.send.mail.section') }}"><i class="far fa-paper-plane"></i><span
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
                    <div class="p-0 inbox-mail">
                        <form class="form-validate-summernote" action="{{ route('admin.communication.message.send.mail') }}" method="POST">
                            @csrf
                            <div class="row p-2">
                                <div class="col-sm-2">
                                    <label>To</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <input id="email-input"  name="email" type="text" class="form-control"
                                        placeholder="someone@example.com" required>
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-sm-2">
                                    <label>Subject</label>
                                </div>
                                <div class="form-group col-md-10">
                                    <input class="form-control" name="subject" type="text"
                                        required data-msg="Please enter your name" />
                                </div>
                            </div>
                            <div class="p-2">
                                <div class="form-group">
                                    <label>Text</label>
                                    <textarea name="body" class="summernote" required
                                        data-msg="Please write something :)"></textarea>
                                </div>
                            </div>
                            <div class="form-group p-2">
                                <button name="action" value="save_to_draft" class="btn btn-warning">Save to Draft</button>
                                <button name="action" value="send" class="btn btn-blue" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
    </section>

</div>

@endsection
@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js'></script>

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

    <script>
	
        $(function () {

            /* Summernote Validation */
        
            var summernoteForm = $('.form-validate-summernote');
            var summernoteElement = $('.summernote');
        
            var summernoteValidator = summernoteForm.validate({
                errorElement: "div",
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                ignore: ':hidden:not(.summernote),.note-editable.card-block',
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("invalid-feedback");
                    console.log(element);
                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.siblings("label"));
                    } else if (element.hasClass("summernote")) {
                        error.insertAfter(element.siblings(".note-editor"));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        
            summernoteElement.summernote({
                height: 300,
                callbacks: {
                    onChange: function (contents, $editable) {
                        // Note that at this point, the value of the `textarea` is not the same as the one
                        // you entered into the summernote editor, so you have to set it yourself to make
                        // the validation consistent and in sync with the value.
                        summernoteElement.val(summernoteElement.summernote('isEmpty') ? "" : contents);
        
                        // You should re-validate your element after change, because the plugin will have
                        // no way to know that the value of your `textarea` has been changed if the change
                        // was done programmatically.
                        summernoteValidator.element(summernoteElement);
                    }
                }
            });
        
        });


	</script>
@endpush