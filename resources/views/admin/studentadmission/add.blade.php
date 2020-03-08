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
    margin-bottom: 0rem !important;
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
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Admission Number <span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="admission_no" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Roll Number</label>
								      <input type="text" class="form-control" name="roll_no" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Class</label>
								     	<select class="form-control" name="class">
								      		<option value="1">Class1</option>
								     	<select>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Section</label>
									      <select class="form-control" name="section">
									      		<option value="1">Section1</option>
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
								      	<option value="1">Male</option>
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
									      	<option value="1">Male</option>
									      <select>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Religion</label>
								      <input type="text" class="form-control" name="religion" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mobile Number <span style="color: red">*</span></label>
								      <input type="text" class="form-control" name="mobile_number" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Email</label>
								      <input type="text" class="form-control" name="email">
								    </div>
								    
								  </div>
								  <div class="form-group row">
								    
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Bload Group</label>
								      <input type="text" class="form-control" name="bload_group">
								    </div>
								   <!--  <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Student House</label>
								      <input type="text" class="form-control" name="cate_name" required>
								    </div> -->
								    <div class="col-sm-3">
									    <label for="inputEmail3" class="text-center">Height</label>
									      <input type="text" class="form-control" name="height">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Weight</label>
								      <input type="text" class="form-control" name="Weight">
								    </div>
								  </div>
								   <div class="form-group row">
								   	<div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Date Of Birth / NationalId No <span style="color: red">*</span></label>
								       <input type="text" name="national_id" class="form-control"/>
								    </div>
								   	 <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Photo</label>
								       <input type="file" name="stu_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
								    </div>
									    <div class="col-sm-3 ">
									    	<label for="inputEmail3" class="text-left shibling"><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus-square"></i> Add Shiblings</a></label>
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
								      <input type="text" class="form-control" name="father_name" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Phone <span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="father_phone" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Occupation</label>
								     	 <input type="text" class="form-control" name="father_ocu">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Father Photo</label>
								      <input type="file" name="father_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Name <span style="color:red">*</span></label>
								      <input type="text" class="form-control" name="mother_name" required>
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Phone</label>
								      <input type="text" class="form-control" name="mother_phone">
								    </div>
								    <div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Occupation</label>
								    	 <input type="text" class="form-control" name="mother_ocu">
								    </div>
  									<div class="col-sm-3">
								    	<label for="inputEmail3" class="text-center">Mother Photo</label>
								      <input type="file" name="mother_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
								    </div>
								  </div>
								  <div class="form-group row">
								    <div class="col-sm-12">
								    	<div class="form-check form-check-inline">
										 <label class="text-left">If Guardian Is<span style="color:red">*</span></label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian" type="radio" id="inlineCheckbox1" value="Father">
										  <label class="form-check-label" for="inlineCheckbox1">Father</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian" type="radio" id="inlineCheckbox2" value="Mother">
										  <label class="form-check-label" for="inlineCheckbox2">Mother</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input" name="guardian" type="radio" id="inlineCheckbox3" value="Other">
										  <label class="form-check-label" for="inlineCheckbox3">Other</label>
										</div>

									    
								    </div>
								  </div>
								  <div class="form-group row">
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Name <span style="color: red">*</span></label>
									      <input type="text" class="form-control" name="guardian_name" required>
									    </div>
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Relation</label>
									      <input type="text" class="form-control" name="guardian_relation" required>
									    </div>
									    <div class="col-sm-3">
										    <label for="inputEmail3" class="text-center">Guardian Email</label>
										      <input type="text" class="form-control" name="guardian_email" required>
									    </div>
									   	 <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Photo</label>
									       <input type="file" name="guardian_pic" id="input-file-now" class="form-control dropify" size="20" height="10px" autocomplete="off"/>
									    </div>
								  </div>

								    <div class="form-group row">
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Phone <span style="color: red">*</span></label>
									      <input type="text" class="form-control" name="guardian_phone" required>
									    </div>
									    <div class="col-sm-3">
									    	<label for="inputEmail3" class="text-center">Guardian Occupation</label>
									      <input type="text" class="form-control" name="guardian_ocu" required>
									    </div>
									    <div class="col-sm-3">
										    <label for="inputEmail3" class="text-center">Guardian Address</label>
										      <input type="text" class="form-control" name="guardian_address">
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
												  <input class="form-check-input" name="guardian" type="checkbox" id="inlineCheckbox1" value="option1">
												  <label class="text-left">If Guardian Address is Current Address<span style="color:red">*</span></label>
												</div>
												<div class="col-sm-12">
												    <label for="inputEmail3" class="text-left">Current Address</label>
												      <textarea  class="form-control" name="current_address"></textarea>
											    </div>
										    </div>
										      <div class="col-sm-6 row">
												<div class="form-check form-check-inline col-sm-12">
												  <input class="form-check-input" name="guardian" type="checkbox" id="inlineCheckbox1" value="option1">
												  <label class="text-left">If Permanent Address is Current Address<span style="color:red">*</span></label>
												</div>
												<div class="col-sm-12">
												    <label for="inputEmail3" class="text-left">Permanent Address</label>
												      <textarea class="form-control" name="permanet_address"></textarea>
											    </div>
										      </div>
										  </div>

									</div>
<!--  -->
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
										    	<label for="inputEmail3" class="text-left">Route List<span style="color: red">*</span></label>
										        <select class="form-control" name="route_id">
										        	<option value="1">option</option>
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
									    	<label for="inputEmail3" class="text-left">Hostel<span style="color: red">*</span></label>
									        <select class="form-control" name="hostel_id">
									        	<option value="1">option</option>
									        </select>
									    </div>
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Room Number<span style="color: red">*</span></label>
									        <select class="form-control" name="room_num">
									        	<option value="1">option</option>
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
									        <textarea class="form-control" name=""></textarea>
									    </div>
									    <div class="col-sm-6">
									    	<label for="inputEmail3" class="text-left">Note</label>
									         <textarea class="form-control" name=""></textarea>
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
								      <button class="btn btn-success">Add Student</button>
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
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Shibling</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
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
	body {
  margin: 10px;
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

@endsection
