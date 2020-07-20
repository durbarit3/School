@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add email Setting</span></div>
                    </div>


                    <form action="{{route('admin.email.update')}}" method="post">
                        @csrf
                    <div class="panel_body">
                        <div class="col-md-8 offset-md-1">

                            <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>Host:</b></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Enter Host Name" value="{{$emailsetting->host}}" name="host" required>
                        </div>
                    </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>Port:</b></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Enter Port Name" value="{{$emailsetting->port}}" name="port" required>
                        </div>
                    </div>

                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>UserName:</b></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Enter User Name" value="{{$emailsetting->username}}" name="username" required>
                        </div>
                    </div>


                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>Password:</b></label>
                        <div class="col-sm-8">
                            <input required type="password" class="form-control" placeholder="Enter User Password" value="{{$emailsetting->password}}" name="password" required>
                        </div>
                    </div>

             

                    <div class="form-group row text-center">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-12">
                                    <input class="btn btn-primary" type="submit" value="Update email Setting">
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- end panel -->
                    </form>
    <!--/ panel -->
</section>
<!--/ page content -->


@endsection
