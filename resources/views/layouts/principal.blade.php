<!doctype html>
<html lang="en">
<head>
	<!-- Define Charset -->
	<meta charset="UTF-8">

	<!-- Page Title -->
	<title>La Hinchada</title>

	<!-- Responsive Metatag --> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
       <link rel="shortcut icon" href="images/favicon.png">   
       
         {!!Html::style('css/bootstrap.min.css')!!}
         {!!Html::style('css/style.css')!!}
   	<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<style id="loader_helper" type="text/css">
		.tp-simpleresponsive >ul >li{visibility: hidden !important;}
	</style>
</head>
@include('alerts.message')

<body>

	<div id="loader">

		<!-- Topbar -->
		<section class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
					</div>
					
				</div>
			</div>
		</section>
		<!-- end Topbar -->
	 	
	 	<!-- Fixed navbar -->



		
		<!-- Slider -->
		<section class="slider" id="menu-slider">
			<div class="container">
				<div class="row">
					@yield('content')
				</div>
			</div>
		</section>
		<!-- end Slider -->

		
		<!-- Features -->

		<!-- end Classes -->


		<!-- Upcoming Classes -->
		
		<!-- end Upcoming Classes -->


		<!-- Teachers -->
		

		
		<!-- Call to action -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h6 class="footer_left"><strong>La Hinchada © 2016.</strong> Todos los derechos reservados.</h6>
						<a href="http://www.dd-wp.com/" title="DD WP" id="dd_wp" class="dd_wp" target="_blank"></a>
					</div>
				</div>
			</div>
		</footer>

		<a href="#" class="scrollup"><i class="icon-up-open"></i></a>      

	</div>
	<!-- end Loader -->


	<div id='siteLoader'> 
		{!!Html::image('img/loader.gif')!!} 
    </div> 

  <!-- ======================= JQuery libs =========================== -->
  
  
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/metisMenu.min.js')!!}
    {!!Html::script('js/sb-admin-2.js')!!}
    {!!Html::script('js/script.js')!!}
    @yield('scripts')

  <!-- ======================= End JQuery libs ======================= -->

</body>
</html>