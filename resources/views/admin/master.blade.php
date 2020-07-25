<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('public/admins/images/favicon.png')}}">
    <!--Page title-->
    <style>
        .header_area{
            @if ($generalSettings->color_theme == 1)
                background-color: #222533;
            @else 
                background-color: #353C48;
            @endif
        }
        .panel_header{
            @if ($generalSettings->color_theme == 1)
                background-color: #222533;
            @else 
                background-color: #353C48;
            @endif
        }
        .sidebar-wrapper ul li .menu-item{
            @if ($generalSettings->color_theme == 1)
                background-color: #222533;
            @else 
                background-color: #353C48;
            @endif 
        }
        .modal-header {
            @if ($generalSettings->color_theme == 1)
                background-color: #222533;
            @else 
                background-color: #353C48;
            @endif
        }
        .header_area .sidebar_logo {
            @if ($generalSettings->color_theme == 1)
                background-color: #222533;
            @else 
                background-color: #353C48;
            @endif
        }
    </style>
    <title>@yield('title', 'DurbarIT School Manage System')</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('public/admins/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admins/plugins/timePicker/css/timepicki.css')}}">
    <link rel="stylesheet" href="{{asset('public/admins/plugins/bootstrap_time_picker/css/bootstrap-datepicker3.css')}}">
    <!--font awesome-->
    <link rel="stylesheet" href="{{asset('public/admins/css/all.css')}}">
    <!--@DataTable_CSS_Link-->
    <link href="{{asset('public/admins/plugins/datatables/dataTables.min.css')}}" rel="stylesheet" type="text/css">
    <!-- metis menu -->
    <link rel="stylesheet" href="{{asset('public/admins/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admins/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
    <!-- chart -->
    <link rel="stylesheet" href="{{asset('public/admins/plugins/chartjs-bar-chart/chart.css')}}">
    <!-- donut-chart -->
    <link rel="stylesheet" href="{{asset('public/admins/plugins/donut-chart/dist/style.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('public/admins/plugins/toastr-js/css/toastr.min.css')}}"> --}}
    <!-- dropify -->
    <link rel="stylesheet" href="{{asset('public/admins/plugins')}}/dist/css/dropify.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('public/admins/css/style.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- Select2 Css Link --}}
    <link rel="stylesheet" href="{{asset('public/admins/plugins/select2/css/select2.min.css')}}">
    {{--  Date Picker Css Link CDN  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @stack('css')
</head>
    
<body id="page-top">
    <!-- preloader -->
    <div class="preloader">
        <img height="180" width="180" src="{{asset('public/admins/images/preloader4.gif')}}" alt="">
    </div>
    <!-- wrapper -->
    <div class="wrapper">
        
        <!-- include top header -->
        @include('admin.include.header_top')

        <!-- include menu  -->
        @include('admin.include.menu')
        <!-- content wrpper -->
        <div class="content_wrapper">

        @yield('content')

        </div>
        
        <!--/ content wrapper -->
        <footer>
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright &copy; 2019 Durbar IT. All rights reserved.</p>
                </div>
                <div class="col-md-6">
                    <span class="my-0 developby"><span>Develop by:</span><a href="https://www.durbarit.com"
                            target="_blank"> Durbar IT</a></span>
                </div>
            </div>
        </footer>
    </div>
    <!--/ wrapper -->

    <!-- jquery -->
    <script src="{{asset('public/admins/js/jquery.min.js')}}"></script>
    <!-- popper Min Js -->
    <script src="{{asset('public/admins/js/popper.min.js')}}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{asset('public/admins/js/bootstrap.min.js')}}"></script>
    <!-- Fontawesome-->
    <script src="{{asset('public/admins/js/all.min.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('public/admins/js/custom.js')}}"></script>
    <script src="{{asset('public/admins/js/sweetalert.js')}}"></script>
    <script src="{{asset('public/admins/js/toster.js')}}"></script>
    <!-- metis menu -->
    {{-- <script src="https://unpkg.com/metismenu"></script> --}}

    <script src="{{asset('public/admins/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
    <script src="{{asset('public/admins/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
    <!-- nice scroll bar -->
    <script src="{{asset('public/admins/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/scrollbar/scroll.active.js')}}"></script>
    <!-- counter -->
    <script src="{{asset('public/admins/plugins/counter/js/counter.js')}}"></script>

    <!-- @basic_donut_chart -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js'></script>

    <script src="{{asset('public/admins/plugins/basic-donut-chart/dist/script.js')}}"></script>
   
    <!-- @DataTable_JS_Link-->
    <script src="{{asset('public/admins/plugins/datatables/dataTables.min.js')}}"></script>
    <script src="{{asset('public/admins/plugins/datatables/dataTables-active.js')}}"></script>
    <!-- donut-chart -->
    @if (Request::is('admin'))
    <script src="{{asset('public/admins/plugins/donut-chart/dist/script.js')}}"></script>
    @endif
    
    <script src="{{asset('public/admins/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- drofify -->
    <script src="{{asset('public/admins/plugins')}}/dist/js/dropify.min.js"></script>
      {{--  Date picker Link Js CDN  --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        $(document).ready(function(){
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
            });
        });
    </script>

    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{asset('public/admins/plugins/toastr-js/js/toastr.min.js')}}"></script>
    <script>
        @if (Session:: has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}", 'Successfull');
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>
    {{-- <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}
    <script>
        $(document).on("click", "#delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
        });
    </script>

    <script>
        $(document).on("submit", "#multiple_delete", function (e) {
            e.preventDefault();
            var link = $(this).attr("href");
            swal({
                title: "Are you sure to delete all?",
                text: "Once Delete, This will be Permanently Delete!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById('multiple_delete').submit();
                } else {
                    swal("Safe Data!");
                }
            });
        });
    </script>
    <!-- Main js -->
    <script src="{{asset('public/admins/js/main.js')}}"></script>
    <script src="{{asset('public/admins/plugins/timePicker/js/timepicki.js')}}"></script>
    <script src="{{asset('public/admins/plugins/bootstrap_time_picker/js/bootstrap-datepicker.js')}}"></script>

    @stack('js')
</body>
</html>
