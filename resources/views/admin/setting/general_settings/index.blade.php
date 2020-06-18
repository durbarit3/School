@extends('admin.master')
@push('css')
    <style>
        .dropify-wrapper {
            height: 70px!important;
        }
        footer {
            
            bottom: -220px;
          
        }
        .theme_selected {
            padding: 3px;
            background-color: cornflowerblue;
            margin: 4px;
        }
    </style>

@endpush
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- content wrpper -->

<!--middle content wrapper-->
    <div class="middle_content_wrapper">
        <section class="page_area">
            <div class="panel">
                <div class="panel_header">
                    <div class="row">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-plus-square"></i></span>
                            <span>General settings</span>
                        </div>
                    </div>
                </div>
                <div class="panel_body">
                    <div><h6>Logo settings</h6></div>
                    <hr class="m-0 p-0">
                    <form action="{{ route('admin.settings.general.logo.update', $generalSettings->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="inputEmail3" class="text-center m-0"><b>App logo</b></label>
                                <input data-default-file="{{ asset('public/uploads/logos/'.$generalSettings->app_logo) }}" accept=".jpg, .jpeg, .png, .gif" type="file" id="app_logo" name="app_logo" id="input-file-now"
                                    class="dropify" size="20"/>
                                <span class="text-danger">{{ $errors->first('app_logo') }}</span>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputEmail3" class="text-center m-0"><b>Print logo</b></label>
                                <input data-default-file="{{ asset('public/uploads/logos/'.$generalSettings->print_logo) }}" accept=".jpg, .jpeg, .png, .gif" type="file" id="print_logo" name="print_logo" id="input-file-now"
                                    class="dropify" size="20"/>
                                <span class="text-danger">{{ $errors->first('print_logo') }}</span>
                            </div>
                        </div>

                        <button class="btn btn-sm btn-blue float-right">Save</button>
                    </form>

                    
                </div>

                <div class="panel_body mt-2">
                    <div><h6>School information settings</h6></div>
                    <hr class="m-0 p-0">

                    <form action="{{ route('admin.settings.general.school.information.update', $generalSettings->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            
                            <div class="col-md-3">
                                <label for="inputEmail3" class="text-center m-0"><b>School name :</b><span
                                    style="color: red">*</span></label>
                                <input type="text" id="school_name" value="{{ $generalSettings->school_name }}" class="form-control form-control-sm" name="school_name"
                                    required>
                                <span class="text-danger">{{ $errors->first('school_name') }}</span>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="inputEmail3" class="text-center m-0"><b>Phone :</b><span
                                    style="color: red">*</span></label>
                                <input type="text" id="phone" value="{{ $generalSettings->phone }}" class="form-control form-control-sm" name="phone"
                                    required>
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="inputEmail3" class="text-center m-0"><b>Email :</b><span
                                    style="color: red">*</span></label>
                                <input type="text" id="email" value="{{ $generalSettings->email }}" class="form-control form-control-sm" name="email"
                                    required>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            
                            <div class="col-md-3">
                                <label for="inputEmail3" class="text-center m-0"><b>Website :</b><span
                                    style="color: red">*</span></label>
                                <input type="text" id="website" value="{{ $generalSettings->website }}" class="form-control form-control-sm" name="website"
                                    required>
                                <span class="text-danger">{{ $errors->first('website') }}</span>
                            </div>

                            <div class="col-md-12 mt-2">
                                <label for="inputEmail3" class="text-center m-0"><b>School address :</b><span
                                    style="color: red">*</span></label>
                                <textarea name="school_address" class="form-control form-control-sm" cols="3" rows="3">{{ $generalSettings->school_address }}</textarea>
                                <span class="text-danger">{{ $errors->first('school_address') }}</span>
                            </div>
                        </div> 
                        

                        <button class="btn btn-sm btn-blue float-right">Save</button>
                    </form>
                </div>
                
                <div class="panel_body mt-2">
                    

                    <div><h6>Attendance settings</h6></div>
                    <hr class="m-0 p-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="attendance_setting mt-2 text-center">
                                    <h5><b>Current day attendance -></b> 
                                        
                                            @if ($generalSettings->current_day_attendance == 1)
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.settings.general.change.current.day.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                                
                                            @else  
                                                <a class="btn btn-sm btn-danger" href="{{ route('admin.settings.general.change.current.day.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-down"></i>  
                                                </a>
                                            @endif
                                            
                                        
                                    </h5> 
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="attendance_setting mt-2 text-center">
                                    <h5><b>Period attendance -></b> 
                                        
                                            @if ($generalSettings->period_attendance == 1)
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.settings.general.change.period.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                            @else  
                                                <a class="btn btn-sm btn-danger" href="{{ route('admin.settings.general.change.period.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-down"></i> 
                                                </a>
                                            @endif
                                        
                                    </h5> 
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="attendance_setting mt-2 text-center">
                                    <h5><b>Exam  attendance -></b> 
                                            @if ($generalSettings->exam_attendance == 1)
                                                <a class="btn btn-sm btn-success" href="{{ route('admin.settings.general.change.exam.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </a>
                                            @else  
                                                <a class="btn btn-sm btn-danger" href="{{ route('admin.settings.general.change.exam.attendance.status', $generalSettings->id) }}">
                                                    <i class="fas fa-thumbs-down"></i> 
                                                </a>
                                            @endif
                                    </h5> 
                                </div>
                            </div>
                        </div>
                </div>  
                
                <div class="panel_body mt-2">
                    <div><h6>Color theme selection</h6></div>
                    <hr class="m-0 p-0">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <a href="{{ route('admin.settings.general.set.color.theme', 1) }}">
                                    <img height="150" class="rounded {{ $generalSettings->color_theme == 1 ? 'theme_selected' : '' }} float-left mt-1" width="200" src="{{ asset('public/admins/themes/theme_1.png') }}" alt="">
                                </a>
                            </div>
                            
                            <div class="col-md-3">
                                <a href="{{ route('admin.settings.general.set.color.theme', 2) }}">
                                    <img  height="150" class="rounded {{ $generalSettings->color_theme == 2 ? 'theme_selected' : '' }} float-left mt-1" width="200" src="{{ asset('public/admins/themes/theme_2.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                </div>
                
               
                
            </div>
            </div>
        </section>
    </div>

<!--/middle content wrapper-->
<!-- hostel select rooom find -->
@endsection

@push('js')
    
    
@endpush