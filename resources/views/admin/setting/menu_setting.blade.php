@extends('admin.master')
@section('content')
	<!--middle content wrapper-->
	<div class="middle_content_wrapper">
	<!-- menu area start -->
		{!! Menu::render() !!}
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		var menus = {
			"oneThemeLocationNoMenus" : "",
			"moveUp" : "Move up",
			"moveDown" : "Mover down",
			"moveToTop" : "Move top",
			"moveUnder" : "Move under of %s",
			"moveOutFrom" : "Out from under  %s",
			"under" : "Under %s",
			"outFrom" : "Out from %s",
			"menuFocus" : "%1$s. Element menu %2$d of %3$d.",
			"subMenuFocus" : "%1$s. Menu of subelement %2$d of %3$s."
		};
		var arraydata = [];     
		var addcustommenur= '{{ route("haddcustommenu") }}';
		var updateitemr= '{{ route("hupdateitem")}}';
		var generatemenucontrolr= '{{ route("hgeneratemenucontrol") }}';
		var deleteitemmenur= '{{ route("hdeleteitemmenu") }}';
		var deletemenugr= '{{ route("hdeletemenug") }}';
		var createnewmenur= '{{ route("hcreatenewmenu") }}';
		var csrftoken="{{ csrf_token() }}";
		var menuwr = "{{ url()->current() }}";

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': csrftoken
			}
		});
	</script>

	<script>
		$(document).ready(function() {
			$('#menu_cat').click(function(params) {
				var cat_id = $(this).val();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					type: 'GET',
					
					url: "{{ url('/admin/get/url/name') }}/" +cat_id,
					dataType:"json",
					success: function(data) {
						
						$('#sitemenus').empty();
						$('#sitemenus').append(' <option value="0">--Please Select Your Division--</option>');
						$.each(data,function(index,divisionobj){
							$('#sitemenus').append('<option value="' + divisionobj.url + '">'+divisionobj.name+'</option>');
						});
					}
				});
			});
			
			$('#sitemenus').click(function(params){
				var weburl = $('#sitemenus').val();
				var webmenus = $('#sitemenus :selected').text();
				document.getElementById('custom-menu-item-url').value = weburl;
				document.getElementById('custom-menu-item-name').value = webmenus;	
			});
		});
	</script>

	<script type="text/javascript" src="{{asset('public/vendor/harimayco-menu/scripts.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/vendor/harimayco-menu/scripts2.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/vendor/harimayco-menu/menu.js')}}"></script>

@endsection



	
