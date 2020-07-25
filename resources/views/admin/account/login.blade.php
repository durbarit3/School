<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.png">
    <!--Page title-->
    <title>Admin DIT</title>
    <!--bootstrap-->
    <link rel="stylesheet" href="{{asset('public/admins/css/bootstrap.min.css')}}">
    <!--Custom CSS-->
    <link rel="stylesheet" href="{{asset('public/admins/css/style.css')}}">
</head>

<body id="page-top">
    <!-- preloader -->
    <div class="preloader">
        <img src="assets/images/preloader.gif" alt="">
    </div>
    <!-- wrapper -->
    <div class="wrapper without_header_sidebar">
        <!-- contnet wrapper -->
        <div class="content_wrapper">
            <!-- page content -->
            <div class="login_page center_container" style="background: url('{{ asset('public/uploads/login_page_background/'.$generalSettings->login_background) }}');">
                <div class="center_content">
                    <div class="logo">
                        <!-- <img src="assets/images/logo.png" alt="" class="img-fluid"> -->
                        <h3>LOGIN TO YOUR ACCOUNT</h3>
                        <div class="admin">
                            <span class="display-3 text-white"><i class="fas fa-key"></i></span>
                            <p class="text-left text-danger">{{ Session::get('successMsg') }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        <div class="form-group icon_parent">
                            <input type="email" placeholder="E-mail" id="email" class="form-control bg-transparent border-0 pl-5" value="{{ old('email') }}" name="email">
                            <span class="icon_soon_bottom_left"><i class="fas fa-envelope"></i></span>

                        </div>
                        <div class="form-group icon_parent">
                            @error('email')
                            <span class="d-block p-0" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group icon_parent">
                            <input type="password" id="password" class="form-control bg-transparent border-0 pl-5" name="password" placeholder="Password">
                            <span class="icon_soon_bottom_left"><i class="fas fa-unlock"></i></span>
                            @error('password')
                            <span class="d-block p-0" role="alert">
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="chech_container fs-14">Remember me
                                    <input type="checkbox" name="remember">
                                    <span class="checkmark bg-transparent"></span>
                                </label>
                            </div>
                            <div class="col-6 form-group">
                                <a href="forget.html" class="text-white fs-14 float-right">Forget Password</a>
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-blue btn-block border-0">Login</button>
                        </div>
                    </form>
                    <div class="footer">
                        <p>Copyright &copy; 2019 <a href="https://durbarit.com/">Durbar IT</a>. All rights reserved.</p>
                    </div>

                </div>
            </div>
        </div>
        <!--/ content wrapper -->
    </div>
    <!--/ wrapper -->
    <!-- click to top -->
    <a href="javascript:void(0);" class="click_to_top" title="Scroll to Top" style="display: none;"><span>top</span></a>
    <!-- jquery -->
    <script src="{{asset('public/admins/js/jquery.min.js')}}"></script>
    <!-- popper Min Js -->
    <script src="{{asset('public/admins/js/popper.min.js')}}"></script>
    <!-- Bootstrap Min Js -->
    <script src="{{asset('public/admins/js/bootstrap.min.js')}}"></script>
    <!-- Fontawesome-->
    <script src="{{asset('public/admins/js/all.min.js')}}"></script>
    <!-- Main js -->
    <script src="{{asset('public/admins/js/main.js')}}"></script>

</body>

</html>
