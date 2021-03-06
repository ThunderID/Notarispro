<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{!!url('/paper/assets/img/apple-icon.png')!!}">
	<link rel="icon" type="image/png" sizes="96x96" href="{!!url('/paper/assets/img/favicon.png')!!}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>{{str_replace('_',' ',env('APP_NAME'))}}</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<!-- Bootstrap core CSS     -->
	<link href="{!!url('/paper/assets/css/bootstrap.min.css')!!}" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="{!!url('/paper/assets/css/animate.min.css')!!}" rel="stylesheet"/>

	<!--  Paper Dashboard core CSS    -->
	<link href="{!!url('/paper/assets/css/paper-dashboard.css')!!}" rel="stylesheet"/>


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="{!!url('/paper/assets/css/demo.css" rel="stylesheet')!!}" />


	<!--  Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="{!!url('/paper/assets/css/themify-icons.css')!!}" rel="stylesheet">

	@stack('styles')

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

	<!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text">
					{{str_replace('_',' ',env('APP_NAME'))}}
				</a>
			</div>

			@include('navigation.left')
		</div>
	</div>

	<div class="main-panel">
		
		@include('scaffold.header')


		@yield('content')


		@include('scaffold.footer')

	</div>
</div>

@stack('before_body')

</body>

	<!--   Core JS Files   -->
	<script src="{!!url('/paper/assets/js/jquery-1.10.2.js')!!}" type="text/javascript"></script>

	<script src="{!!url('/paper/assets/js/bootstrap.min.js')!!}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{!!url('/paper/assets/js/bootstrap-checkbox-radio.js')!!}"></script>

	<!--  Charts Plugin -->
	<script src="{!!url('/paper/assets/js/chartist.min.js')!!}"></script>

	<!--  Notifications Plugin    -->
	<script src="{!!url('/paper/assets/js/bootstrap-notify.js')!!}"></script>

	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

	<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{!!url('/paper/assets/js/paper-dashboard.js')!!}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="{!!url('/paper/assets/js/demo.js')!!}"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			// $.notify({
			// 	icon: 'ti-gift',
			// 	message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

			// },{
			// 	type: 'success',
			// 	timer: 4000
			// });
		} );

	</script>

	@stack('scripts')
</html>
