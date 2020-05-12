@extends('admin.master')
@section('content')
 <style>
.dropify-wrapper {
    display: block;
    position: relative;
    cursor: pointer;
    overflow: hidden;
    width: 100%;
    max-width: 100%;
    height: 37px;
    padding: 4px 3px;
    font-size: 3px;
    line-height: 0px;
    color: #777;
    background-color: #FFF;
    background-image: none;
    text-align: center;
    border: 3px solid #E5E5E5;
    -webkit-transition: border-color .15s linear;
    transition: border-color .15s linear;
}
.form-group {
    margin-bottom: 1rem !important;
}
.collapsed a{
    color: #ffffff;

}
label.text-left.shibling {
    margin-top: 34px;
}
a.anchor-collaps.collapsed {
    color: #fff;
}
</style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- content wrpper -->

				<!--middle content wrapper-->
				<div class="middle_content_wrapper">

				<section class="page_area">
					<form action="{{url('admin/student/submit')}}" method="POST" enctype="multipart/form-data" >
						        @csrf
					<div class="panel">
						<div class="panel_header">
							<div class="row">

									<div class="panel_title">
										<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
										<span>Student Information</span>
									</div>

							</div>
						</div>
						<div class="panel_body">

								 <div class="form-group row">
								    <div class="col-sm-3 {{$errors->has('admission_no')? ' has-error':''}}">
								    	<label for="inputEmail3" class="text-center">Admission Number <span style="color:red">*</span></label>
								        <input type="text" class="form-control" name="admission_no" required>
								         @if ($errors->has('admission_no'))
    											<span class="invalid-feedback mb-0" role="alert">
    													<strong>{{ $errors->first('admission_no') }}</strong>
    											</span>
    									@endif
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Roll Number<span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="roll_no" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Class <span style="color:red">*</span></label>
								     	<select class="form-control" name="select_class" id="select_class" required>
								     		<option value="">Selecet</option>
								     		@foreach($allClass as $cleases)
								      		<option value="{{ $cleases->id }}">{{ $cleases->name }}</option>
								      		@endforeach
								     	<select>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Section</label>
									      <select class="form-control" name="section" id="sections">

									      <select>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">First Name <span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="first_name" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Last Name</label>
								      <input type="text" class="form-control" name="last_name">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Gender</label>
									      <select class="form-control" name="gender">
									      	@foreach($gender as $genders)
									      	<option value="{{$genders->id}}">{{$genders->name}}</option>
									      	@endforeach
									      <select>
								    </div>

								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Date Of Birth<span style="color:red">*</span></label>
								      <input type="date" class="form-control" name="date_of_birth" required>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-3">
									    <label for="inputEmail3" class="text-center">Category</label>
									      <select class="form-control" name="category">
									      	@foreach($category as $cate)
									      	<option value="{{$cate->id}}">{{$cate->name}}</option>
									      	@endforeach
									      <select>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Religion</label>
								      <input type="text" class="form-control" name="religion">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mobile Number <span style="color: red">*</span></label>
								      <input type="text" class="form-control" name="student_mobile">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Email</label>
								      <input type="text" class="form-control" name="student_email">
								    </div>

								  </div>
								  <div class="form-group row">
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Blood Group</label>
								        <select class="form-control" name="blood_group">
								        	<option value="">Select</option>
								        	@foreach($bloodgroup as $blood)
								        	<option value="{{$blood->id}}">{{$blood->group_name}}</option>
								        	@endforeach
								        </select>
								    </div>
								    <div class="col-sm-3">
									    <label for="inputEmail3" class="text-center">Height</label>
									      <input type="text" class="form-control" name="height">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Weight</label>
								      <input type="text" class="form-control" name="weight">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Admission Date</label>
								        <input type="date" class="form-control" name="admission_date" >
								    </div>
								  </div>
								   <div class="form-group row">
								   	<div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Date Of Birth ID No / NationalId No <span style="color: red">*</span></label>
								       <input type="text" name="nid_or_birthid" class="form-control" required />
								    </div>
								     <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Group /Department <span style="color: red">*</span></label>
								         <select class="form-control" name="group_id" required>
								         	<option>Select</option>
								         	@foreach($groups as $group)
								         	<option value="{{$group->id}}">{{$group->name}}</option>
								         	@endforeach
								         </select>
								    </div>
								   	 <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Photo</label>
								       <input type="file" name="stu_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-left shibling"><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus-square"></i> Add Shiblings</a></label>
								    	<input type="hidden" name="sibling" value="NULL">
								    </div>
									
								  </div>

						</div>
					</div>
					<!-- section  -->
					<div class="panel">
						<div class="panel_header">
							<div class="row">
									<div class="panel_title">
										<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
										<span>Parent Guardian Detail</span>
									</div>
							</div>
						</div>
						<div class="panel_body">


								 <div class="form-group row">
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Name<span style="color:red">*</span></label>
								      <input id="father_name" type="text" class="form-control" name="father_name" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Phone <span style="color:red">*</span></label>
								      <input id="father_phone" type="text" class="form-control" name="father_phone"  required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Occupation</label>
								     	 <input type="text" class="form-control" name="father_occupation" id="father_occupation">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Photo</label>
								      <input type="file" name="father_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off" required/>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Name <span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="mother_name" id="mother_name" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Phone</label>
								      <input type="text" class="form-control" name="mother_phone" id="mother_phone">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Occupation</label>
								    	 <input type="text" class="form-control" name="mother_occupation" id="mother_occupation" value="">
								    </div>
  									<div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Photo</label>
								      <input type="file" name="mother_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off" required/>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-12{{$errors->has('guardian_is')? ' has-error':''}}">
								    	<div class="form-check form-check-inline">
										 <label class="text-left">If Guardian Is<span style="color:red">*</span></label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian_is" type="radio" id="inlineCheckbox1" value="father">
										  <label class="form-check-label" for="inlineCheckbox1">Father</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian_is" type="radio" id="inlineCheckbox2" value="mother">
										  <label class="form-check-label" for="inlineCheckbox2">Mother</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian_is" type="radio" id="inlineCheckbox3" value="other">
										  <label class="form-check-label" for="inlineCheckbox3">Other</label>
										</div>

										@if ($errors->has('guardian_is'))
											<span class="invalid-feedback mb-0" role="alert">
													<strong>{{ $errors->first('guardian_is') }}</strong>
											</span>
    									@endif

								    </div>
								  </div>
								  <div class="form-group row">
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Name <span style="color: red">*</span></label>
									      <input type="text" class="form-control" name="guardian_name" id="guardian_name" required>
									    </div>
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Relation</label>
									      <input type="text" class="form-control" name="guardian_relation" id="guardian_relation" value="">
									    </div>
									    <div class="col-sm-3">
										    <label for="inputEmail3" class="text-center">Guardian Email</label>
										      <input type="text" class="form-control" name="guardian_email">
									    </div>
									   	 <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Photo</label>
									       <input type="file" name="guardian_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off" required/>
									    </div>
								  </div>

								    <div class="form-group row">
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Phone <span style="color: red">*</span></label>
									      <input type="text" class="form-control" id="guardian_phone" name="guardian_phone" value="" required>
									    </div>
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Occupation</label>
									      <input type="text" class="form-control" name="guardian_occupation" id="guardian_occupation">
									    </div>
									    <div class="col-sm-3">
										    <label for="inputEmail3" class="text-center">Guardian Address</label>
										      <input type="text" class="form-control" name="guardian_address" id="guardian_address">
									    </div>
								 	 </div>

						</div>
					</div>



					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel">
					    <div class="panel_header" role="tab" id="headingOne">
					      <h4 class="panel-title">
					        <a class="anchor-collaps collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					          Add More Details
					          <span class="plus-minus-toggle"></span>
					        </a><!--<span class="icon">-</span> -->
					      </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					      <div class="panel-body">
					      	<div class="panel">
								<div class="panel_header">
									<div class="row">
											<div class="panel_title">
												<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
												<span>Student Address Details</span>
											</div>
									</div>
								</div>
								<div class="panel_body">
										  <div class="form-group row">
										    <div class="col-sm-6 row">
												<div class="form-check form-check-inline col-sm-12">
												  <input class="form-check-input" name="autofill_current_address" type="checkbox" id="autofill_current_address" value="option1"
												  onclick="return auto_fill_guardian_address();" >

												  <label class="text-left">If Guardian Address is Current Address<span style="color:red"></span></label>
												</div>
												<div class="col-sm-12">
												    <label for="inputEmail3" class="text-left">Current Address</label>
												      <textarea  class="form-control" name="current_address" id="current_address"></textarea>
											    </div>
										    </div>
										      <div class="col-sm-6 row">
												<div class="form-check form-check-inline col-sm-12">
												  <input class="form-check-input" name="autofill_address" type="checkbox" id="autofill_address" onclick="return auto_fill_address();">
												  <label class="text-left">If Permanent Address is Current Address<span style="color:red"></span></label>
												</div>
												<div class="col-sm-12">
												    <label for="inputEmail3" class="text-left">Permanent Address</label>
												      <textarea class="form-control" name="permanent_address" id="permanent_address"></textarea>
											    </div>
										      </div>
										  </div>

									</div>

								<div class="panel_header">
									<div class="row">
											<div class="panel_title">
												<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
												<span>Student Transport Details</span>
											</div>
									</div>
								</div>
								<div class="panel_body">

										  <div class="form-group row">
										    <div class="col-sm-6">
										    	<label for="inputEmail3" class="text-left">Route List<span style="color: red"></span></label>
										        <select class="form-control" name="route_id" id="route_id">
										        	<option value="">Select</option>
										        	@foreach($routes as $route)
										        	<option value="{{$route->id}}">{{$route->name}}</option>
										        	@endforeach
										        </select>
										    </div>
										    <div class="col-sm-6">
										    	<label for="inputEmail3" class="text-left">Bus<span style="color: red"></span></label>
										        <select class="form-control" name="bus_id" id="bus_id">

										        </select>
										    </div>
								 		 </div>

									</div>

								<div class="panel_header">
									<div class="row">
											<div class="panel_title">
												<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
												<span>Student Hostel Details</span>
											</div>
									</div>
								</div>
								<div class="panel_body">
									  <div class="form-group row">
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Hostel<span style="color: red"></span></label>
									        <select class="form-control" name="hostel_id" id="hostel_id">
									        	<option value="">Select</option>
									        	@foreach($hostel as $hos)
									        	<option value="{{$hos->id}}">{{$hos->hostel_name}}</option>
									        	@endforeach
									        </select>
									    </div>
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Room Number<span style="color: red"></span></label>
									        <select class="form-control" name="rooom_number" id="rooom_number">
									        	<option value="">Select</option>
									        </select>
									    </div>
							 		 </div>
								</div>
									<div class="panel_header">
									<div class="row">
											<div class="panel_title">
												<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
												<span>More Information</span>
											</div>
									</div>
								</div>
								<div class="panel_body">
									  <div class="form-group row">
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Previous School Details<span style="color: red">*</span></label>
									        <textarea class="form-control" name="previous_school_detail"></textarea>
									    </div>
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Note</label>
									         <textarea class="form-control" name="previous_school_note"></textarea>
									    </div>
									   
							 		 </div>
								</div>
									<div class="panel_header">
									<div class="row">
											<div class="panel_title">
												<span class="panel_icon"><i class="fas fa-plus-square"></i></span>
												<span>Upload Documents</span>
											</div>
									</div>
								</div>
								<div class="panel_body">
									  <div class="form-group row">
									  	<div class="col-sm-1">
									    	<!-- -->
									       
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Title</label>
									        <input type="text" name="docu_title1" class="form-control">
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Document</label>
									         <input type="file" name="docu_1" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
									    </div>
									   
							 		 </div>
							 		  <div class="form-group row">
									  	<div class="col-sm-1">
									    	<!-- -->
									       
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Title</label>
									         <input type="text" name="docu_title2" class="form-control">
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Document</label>
									         <input type="file" name="docu_2" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
									    </div>
									   
							 		 </div>
							 		  <div class="form-group row">
									  	<div class="col-sm-1">
									    	<!-- -->
									       
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Title</label>
									         <input type="text" name="docu_title3" class="form-control">
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Document</label>
									         <input type="file" name="docu_3" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
									    </div>
									   
							 		 </div>
							 		  <div class="form-group row">
									  	<div class="col-sm-1">
									    	<!-- -->
									       
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Title</label>
									        <input type="text" name="docu_title4" class="form-control">
									    </div>
									    <div class="col-sm-5">
									    	<label for="inputEmail3" class="text-left">Document</label>
									         <input type="file" name="docu_4" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
									    </div>

							 		 </div>
								</div>

							</div>
					      </div>
					    </div>
					  </div>
					</div>
						<div class="panel">
							<div class="panel_body">
								 <div class="form-group row">
								   	 <div class="col-sm-12 text-center">
								      <button type="submit" class="btn btn-success">Add Student</button>
								    </div>
								  </div>
							</div>
						</div>
					</form>
				</section>
			</div><!--/middle content wrapper-->


  <div class="modal fade" id="myModal1">
	    <div class="modal-dialog modal-xl">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h4 class="modal-title">Shibling</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body">
	          <form action="" method="post">
			    <div class="form-group row">
			      <label for="email" class="col-md-3">Class</label>
			    	<select class="form-control col-md-8">
			    		<option value="1">--select--</option>
			    		<option value="2">new</option>
			    	</select>
			    </div>
			    <div class="form-group row">
			      <label for="pwd" class="col-md-3">Section</label>
			      <select class="form-control col-md-8">
			    		<option value="1">--select--</option>
			    		<option value="2">new</option>
			    	</select>
			    </div>
			       <div class="form-group row">
			      <label for="pwd" class="col-md-3">Student</label>
			      <select class="form-control col-md-8">
			    		<option value="1">--select--</option>
			    		<option value="2">new</option>
			    	</select>
			    </div>
			    <div class="form-group text-right">
			    	<button type="submit" class="btn btn-blue">Submit</button>
			    </div>
			  </form>
	        </div>
	      </div>
	    </div>
</div>

<style>
.invalid-feedback {
display: flex;
width: 100%;
margin-top: .25rem;
font-size: 80%;
color: #dc3545;
}
	label.text-left.shibling {
    margin-top: 33px;
}
h4.panel-title {
margin: 0px;
color: #fff;
}
h4.panel-title a{

color: #fff;
}


.panel-default {
  border-color: #fff;
}

.icon {
  font-size: 30px;
  color: #fff;
  line-height: 15px;
}

.blue {
  background-color: #006DB4 !important;
  color: #FFF !important;
}

.plus-minus-toggle {
  cursor: pointer;
  height: 15px;
  position: relative;
  width: 15px;
  float: right;
  top: 5px;
}

.plus-minus-toggle:before {
  background: #fff;
  content: '';
  height: 5px;
  left: 0;
  position: absolute;
  top: 0;
  width: 15px;
  transition: background 500ms, transform 500ms;
  transform: rotate(90deg);
}

.plus-minus-toggle:after {
  background: #fff;
  content: '';
  height: 5px;
  left: 0;
  position: absolute;
  top: 0;
  width: 15px;
  transition: background 500ms, transform 500ms;
}

.plus-minus-toggle:after {
  transform-origin: center;
}

.plus-minus-toggle.custom-collapsed:after {
  transform: rotate(180deg);
  background: #FFF;
}

.plus-minus-toggle.custom-collapsed:before {
  transform: rotate(180deg);
  background: #FFF;
}

</style>
<script>

	$('.anchor-collaps').on('click', function() {

  var a = $('#accordion').find('.custom-collapsed');
  var b = $('#accordion').find('.blue');

  var c = $(this).find('.custom-collapsed');
  var d = $(this).find('.blue');



  if( a.length > 0 || b.length > 0) {

    if(c.length > 0 || d.length > 0) {
       $(this).find('.plus-minus-toggle').toggleClass('custom-collapsed');
       $(this).closest('.panel-heading').toggleClass('blue');
    }
    else {

    $('.plus-minus-toggle').removeClass('custom-collapsed');
    $('.panel-heading').removeClass('blue');

       $(this).find('.plus-minus-toggle').toggleClass('custom-collapsed');
  $(this).closest('.panel-heading').toggleClass('blue');



    }

  }
  else {

  $(this).find('.plus-minus-toggle').toggleClass('custom-collapsed');
  $(this).closest('.panel-heading').toggleClass('blue');

  }

  class Person {
    greet() {
      console.log(this);
    }

  }



});


</script>

<script type="text/javascript">
  $(document).ready(function() {
     $('select[name="select_class"]').on('change', function(){
         var id = $(this).val();
         //alert("success");
         if(id) {
             $.ajax({
                 url: "{{  url('admin/student/section/all/') }}/"+id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {

                        $('#sections').empty();
                        $('#sections').append(' <option value="">--Select--</option>');
                        $.each(data,function(index,districtObj){
                         $('#sections').append('<option value="' + districtObj.section_id + '">'+districtObj.section.name+'</option>');
                       });
                     }
             });
         } else {
             alert('danger');
         }

     });
 });

</script>
<!-- route -->
<script type="text/javascript">
  $(document).ready(function() {
     $('select[name="route_id"]').on('change', function(){
         var id = $(this).val();
         //alert("success");
         if(id) {
             $.ajax({
                 url: "{{  url('admin/student/route/') }}/"+id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {

                        $('#bus_id').empty();
                        $('#bus_id').append(' <option value="">--Select--</option>');
                        $.each(data,function(index,districtObj){
                         $('#bus_id').append('<option value="' + districtObj.vehicle_id + '">'+districtObj.vehicle.vehicle_number+'</option>');
                       });
                     }
             });
         } else {
             alert('danger');
         }

     });
 });

</script>
<!-- hostel select rooom find -->
<script type="text/javascript">
  $(document).ready(function() {
     $('select[name="hostel_id"]').on('change', function(){
         var id = $(this).val();
         //alert(id);
         if(id) {
             $.ajax({
                 url: "{{  url('admin/student/get/hostel/') }}/"+id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                        $('#rooom_number').empty();
                        $('#rooom_number').append(' <option value="">--Select--</option>');
                        $.each(data,function(index,districtObj){
                         $('#rooom_number').append('<option value="' + districtObj.id + '">'+districtObj.room_number+'</option>');
                       });
                     }
             });
         } else {
             alert('danger');
         }

     });
 });

</script>

<script>
	 $(document).ready(function() {
	   $('input:radio[name="guardian_is"]').change(function(){
            	//alert("success");
                if ($(this).is(':checked')) {
                    var value = $(this).val();
                    if (value == "father") {
                    	//alert("father");
                        $('#guardian_name').val($('#father_name').val());
                        $('#guardian_phone').val($('#father_phone').val());
                        $('#guardian_occupation').val($('#father_occupation').val());
                         $('#guardian_relation').val("Father");
                    } else if (value == "mother") {
                    	//alert("mother");
                        $('#guardian_name').val($('#mother_name').val());
                        $('#guardian_phone').val($('#mother_phone').val());
                        $('#guardian_occupation').val($('#mother_occupation').val());
                         $('#guardian_relation').val("Mother");
                    } else {
                    	//alert("other");
                        $('#guardian_name').val("");
                        $('#guardian_phone').val("");
                        $('#guardian_occupation').val("");
                        $('#guardian_relation').val("")
                    }
                }
            })
      });

</script>
<script>
	
	  function auto_fill_guardian_address() {
        if ($("#autofill_current_address").is(':checked'))
        {
        	//alert("success");
            $('#current_address').val($('#guardian_address').val());
        }
    }
    function auto_fill_address() {
        if ($("#autofill_address").is(':checked'))
        {
            $('#permanent_address').val($('#current_address').val());
        }
    }
</script>

@endsection
