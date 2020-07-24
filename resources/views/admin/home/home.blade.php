@extends('admin.master')
@push('css')
	<style>
		section {display: block;overflow: hidden;padding: 10px 0px;}
		.indecate_style{padding: 0px 16px;border-radius: 4px;margin-right: 4px;}
		.indiactor li {font-size: 12px;}
	</style>
@endpush
@section('content')
<!--middle content wrapper-->
<div class="middle_content_wrapper">
					<!-- counter_area -->
					<section class="counter_area">
						<div class="row">
							<div class="col-lg-3 col-md-6">
								<div class="counter">
									<div class="counter_item">
										 <span><i class="fa fa-code"></i></span>
							    		  <h2 class="timer count-number" data-to="{{ $totalEmployee }}" data-speed="1500"></h2>
									</div>
							     
							       <p class="count-text "><b>Total Employee</b></p>
							    </div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter">
									<div class="counter_item">
										<span><i class="fa fa-coffee"></i></span>
							     		 <h2 class="timer count-number" data-to="{{ $totalStudent }}" data-speed="1500"></h2>
									</div>
									<p class="count-text "><b>Total Student</b> </p>
							    </div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter">
									<div class="counter_item">
										<span><i class="fas fa-user"></i></span>
								     	 <h2 class="timer count-number" data-to="{{ $totalTeacher }}" data-speed="1500"></h2>
									</div>
									<p class="count-text "><b>Total Teacher</b> </p>
								      
							    </div>
							</div>
							<div class="col-lg-3 col-md-6">
								<div class="counter">
									<div class="counter_item">
										<span><i class="fa fa-bug"></i></span>
							     		 <h2 class="timer count-number" data-to="{{ $totalAdmin }}" data-speed="1500"></h2>
									</div>
							     	 <p class="count-text"><b>Total Admin</b> </p>
							    </div>
							</div>
						</div>
					</section>
					
					<!-- table area -->
					<section class="table_area">
						{{--  <div class="panel">
							<div class="panel_header">
								<div class="panel_title"><span>FooTable with row toggler, sorting, filter and pagination</span></div>
							</div>
							<div class="panel_body">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
	                                      <tr>
	                                          <th>ID</th>
	                                          <th>First Name</th>
	                                          <th>Last Name</th>
	                                          <th>Job Title</th>
	                                          <th>Started On</th>
	                                          <th data-hide="all">Date of Birth</th>
	                                      </tr>
	                                  </thead>
	                                  <tbody>
	                                      <tr>
	                                          <td>1</td>
	                                          <td>Dennise</td>
	                                          <td>Fuhrman</td>
	                                          <td>High School History Teacher</td>
	                                          <td>November 8th 2011</td>
	                                          <td>July 25th 1960</td>
	                                      </tr>
	                                      <tr>
	                                          <td>2</td>
	                                          <td>Elodia</td>
	                                          <td>Weisz</td>
	                                          <td>Wallpaperer Helper</td>
	                                          <td>October 15th 2010</td>
	                                          <td>March 30th 1982</td>
	                                      </tr>
	                                      <tr>
	                                          <td>3</td>
	                                          <td>Raeann</td>
	                                          <td>Haner</td>
	                                          <td>Internal Medicine Nurse Practitioner</td>
	                                          <td>November 28th 2013</td>
	                                          <td>February 26th 1966</td>
	                                      </tr>
	                                      <tr>
	                                          <td>4</td>
	                                          <td>Junie</td>
	                                          <td>Landa</td>
	                                          <td>Offbearer</td>
	                                          <td>October 31st 2010</td>
	                                          <td>March 29th 1966</td>
	                                      </tr>
	                                      <tr>
	                                          <td>5</td>
	                                          <td>Solomon</td>
	                                          <td>Bittinger</td>
	                                          <td>Roller Skater</td>
	                                          <td>December 29th 2011</td>
	                                          <td>September 22nd 1964</td>
	                                      </tr>
	                                      <tr>
	                                          <td>6</td>
	                                          <td>Bar</td>
	                                          <td>Lewis</td>
	                                          <td>Clown</td>
	                                          <td>November 12th 2012</td>
	                                          <td>August 4th 1991</td>
	                                      </tr>
	                                      <tr>
	                                          <td>7</td>
	                                          <td>Usha</td>
	                                          <td>Leak</td>
	                                          <td>Ships Electronic Warfare Officer</td>
	                                          <td>August 14th 2012</td>
	                                          <td>November 20th 1979</td>
	                                      </tr>
	                                      <tr>
	                                          <td>8</td>
	                                          <td>Lorriane</td>
	                                          <td>Cooke</td>
	                                          <td>Technical Services Librarian</td>
	                                          <td>September 21st 2010</td>
	                                          <td>April 7th 1969</td>
	                                      </tr>
	                                      <tr>
	                                          <td>9</td>
	                                          <td>Lorriane</td>
	                                          <td>Cooke</td>
	                                          <td>Technical Services Librarian</td>
	                                          <td>September 21st 2010</td>
	                                          <td>April 7th 1969</td>
	                                      </tr>
	                                  </tbody>
									</table>
								</div>
							</div>
						</div> <!-- /table -->  --}}
						<!-- chart area -->

						<div class="row">
							<div class="col-lg-12">
								<div class="panel chart_area">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="far fa-chart-bar"></i></span>
											<span>Financial Ration</span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 mx-auto">
											<div class="panel_body">
												<div class="indiactor">
													<ul>
														<li>
															<span style="background-color:#e96696" class="indecate_style text-dark"></span> <b>Expansse</b> 
														</li>
														<li>
															<span style="background-color:#66c0e9"  class="indecate_style text-dark"></span> 
															<b>Income</b> </li>
														<li>
															<span style="background-color:#f0b966"  class="indecate_style text-dark"></span> 
															<b>Fees</b> 
														</li>
														<li>
															<span style="background-color:#66f3d0"  class="indecate_style text-dark"></span>
															<b> Salary</b>
														</li>
													</ul>
												</div>
												<div id="bar-chart">
													{{--  <div id="bar-legend"></div>  --}}
													<canvas id="bar-canvas"></canvas>
												</div>
											</div>
										</div>
									</div>
								</div> 
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-xl-6">
								<div class="panel">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
											<span>Header wise expanse chart of <b>{{ date('F Y') }}</b></span>
										</div>
									</div>
									<div class="panel_body">
										<div id="expanse_chart"></div>
									</div>
								</div> 
							</div>
							
							<div class="col-lg-6 col-xl-6">
								<div class="panel">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
											<span>Header wise income chart of <b>{{ date('F Y') }}</b></span>
										</div>
									</div>
									<div class="panel_body">
										<div id="income_chart"></div>
									</div>
								</div> 
							</div>
						</div>
					</section>

					<!--/ counter_area -->
					<section class="counter_area">
						<div class="row">
							<div class="col-lg-6 col-xl-4 col-md-9">
								<div class="panel">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
											<span>Browser Market Share</span>
										</div>
									</div>
									<div class="panel_body">
										<div id="chart" class="chart-container d-flex justify-content-center">

										</div>
									</div>
								</div> 
							</div>
							<div class="col-lg-6 col-xl-4 col-md-9">
								<div class="panel">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
											<span>D3 Donut Pie Chart</span>
										</div>
									</div>
									<div class="panel_body d-flex justify-content-around">
									    <div class="donut-chart" data-donut-chart="1"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-xl-4 col-md-9">
								<div class="panel">
									<div class="panel_header">
										<div class="panel_title">
											<span class="panel_icon"><i class="fas fa-chart-pie"></i></span>
											<span>D3 Donut Pie Chart</span>
										</div>
									</div>
									<div class="panel_body d-flex justify-content-around">
									    <div class="donut-chart" data-donut-chart="2"></div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- 
					<div class="panel">
						<div class="panel_header">
							<div class="panel_title">
								<span class="panel_icon">icon1</span>
								<span>title</span>
							</div>
						</div>
						
						<div class="panel_body">
							
						</div>
					</div> 
					-->
				</div>
				<!--/middle content wrapper-->
		@endsection
		
		@push('js')

				<script>
					var date = new Date();
				</script>
			
		@endpush