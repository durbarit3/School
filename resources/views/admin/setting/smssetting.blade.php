@extends('admin.master')
@section('content')
<section class="page_content">
    <!-- panel -->
    <div class="panel">
                    <div class="panel_header">
                        <div class="panel_title"><span>Add SMS Setting</span></div>
                    </div>


                    <form action="{{route('admin.sms.update')}}" method="post">
                        @csrf
                    <div class="panel_body">
                        <div class="col-md-8 offset-md-1">

                            <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>User Name:</b></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Enter User Name" value="{{$smssetting->username}}" name="username" required>
                        </div>
                    </div>


                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>Password:</b></label>
                        <div class="col-sm-8">
                            <input required type="password" class="form-control" placeholder="Enter User Password" value="{{$smssetting->password}}" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-right"><b>Api Id:</b></label>
                        <div class="col-sm-8">
                            <input required type="text" class="form-control" placeholder="Enter SMS Api ID" value="{{$smssetting->apiid}}" name="apiid" required>
                        </div>
                    </div>
             

                    <div class="form-group row text-center">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-12">
                                    <input class="btn btn-primary" type="submit" value="Update SMS Setting">
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
