@extends('admin.master')
@push('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.css'>
    <style>
        input#email-input {
            font-size: 13px;
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 pr-md-0">
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
                                        <li><a href="{{ route('admin.communication.message.mail.trashes') }}"><i class="fa fa-trash"></i><span
                                                    class="pl-2">Trash</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border border-right-0 border-top-0 border-bottom-0 pl-md-0">
                        <div class="p-0 inbox-mail">
                            <form class="form-validate-summernote" method="post" action="{{ route('admin.communication.message.send.bulk.mail') }}">
                                @csrf
                                <input type="hidden" name="draft_id" value="{{ $draftMail ? $draftMail->id : '' }}">
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                        <label>To</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input id="email-input" name="emails" type="text" class="form-control"
                                            placeholder="someone@example.com" required="required">
                                    </div>
                                </div>
                                <div class="row p-2">
                                    <div class="col-sm-2">
                                        <label>Subject</label>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <input class="form-control" name="subject" type="subject" value="{{ $draftMail ?$draftMail->subject : ''}}" required="required"
                                            data-msg="Please enter your name" />
                                    </div>
                                </div>
                                <div class="p-2">
                                    <div class="form-group">
                                        <label>Text</label>
                                        <textarea class="summernote" name="body" required="required"
                                            data-msg="Please write something :)">{{ $draftMail ? $draftMail->body : ''}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group p-2">
                                    <button type="submit" name="action" value="save_to_draft" class="btn btn-warning">Save to Draft</button>
                                    <button name="action" value="send" class="btn btn-blue" type="submit">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-2">
                            <h3 class="panel-title"> <span class="menu-icon"> <i class="glyphicon glyphicon-book"></i>
                                </span> Address Book </h3>
                        </div>
                        <!-- vd_panel-heading -->

                        <div class="panel-body">
                            <div class="form-group pr-1 icon_parent">
                                <input type="text" class="form-control" id="filter-text" placeholder="Name Filter">
                                <span class="icon_soon_bottom_right"><i class="fa fa-search"></i></span>
                            </div>
                    
                            <div class="form-group pr-1 icon_parent">
                                <select name="roll_id" class="form-control" id="roles">
                                    <option value="">Select staff designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->designation_known_id }}">{{ $designation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br />
                            <form class="form-horizontal" role="form" action="#">

                                <a href="#" id="check-all">Check All</a> <span class="mgl-10 mgr-10">/</span> <a href="#"
                                    id="uncheck-all">Uncheck All</a>

                                <hr class="" />
                                <div class="form-group clearfix" style="height: 250px; overflow-y:scroll;">
                                    <div class="col-md-12">
                                        <div class="content-list content-menu" id="email-list">
                                            <div class="list-wrapper wrap-25 isotope">
                                                
                                            </div>
                                            <!-- list-wrapper -->
                                        </div>
                                        <!-- content-list -->
                                    </div>
                                    <!-- col-md-12 -->
                                </div>
                                <!-- form-group -->


                                <hr />
                                <div class="form-group">
                                    <button type="button" id="insert-email-btn" class="btn btn-blue"><i
                                            class="fa fa-angle-double-left append-icon"></i> INSERT</button>
                                </div>
                            </form>

                        </div>
                        <!-- panel -->
                    </div>
                </div>
        </section>
    </div>
@endsection

@push('js')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.10/summernote-bs4.js'></script>
    <script src="{{asset('public/admins/plugins/multi_select_Suggestags/js/jquery.amsify.suggestags.js')}}"></script>
    <script src="{{asset('public/admins/plugins/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/bootstrap-wysiwyg/js/bootstrap-wysihtml5-0.0.2.js')}}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#roles').on('change', function () {
                var role_id = $(this).val();
                if (role_id) {
                    $.ajax({
                        url: "{{ url('admin/communication/message/via/email/get/stuff/by/') }}/" + role_id,
                        type: "GET",
                        success: function (data) {
                            $(".isotope").empty();
                            $(".isotope").append(data);
                        }
                    });
                } else {
                    alert('danger');
                }
    
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            "use strict";

            $('#message').wysihtml5();

            // init Isotope
            var $container = $('.isotope').isotope({
                itemSelector: '.isotope .email-item',
                layoutMode: 'vertical'
            });

            // User types in search box - call our search function and supply lower-case keyword as argument
            $('#filter-text').bind('keyup', function () {
                var filterValue = this.value.toLowerCase();
                isotopeFilter();
            });

            var filterFns = function () {
                var kwd = $('#filter-text').val().toLowerCase();
                var re = new RegExp(kwd, "gi");
                var name = $(this).find('.filter-name').text();
                return name.match(re);
            }

            function isotopeFilter() {
                $container.isotope({ filter: filterFns });
            }


            $('#check-all').click(function () {
                $('.email-item input').prop('checked', true);
            });
            $('#uncheck-all').click(function () {
                $('.email-item input').prop('checked', false);
            });

            $('#insert-email-btn').click(function (e) {
                e.preventDefault();
                var emails = '';
                emails = $('.email-item input:checked').map(function (n) {  //map all the checked value to tempValue with `,` seperated
                    return this.value;
                }).get().join(' , ');
                var comma = $('#email-input').val() ? ' , ' : '';
                if (emails) {
                    $('#email-input').val($('#email-input').val() + comma + emails);
                }
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