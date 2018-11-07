
<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SmartAdmin </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}">

		<!-- SmartAdmin RTL Support -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip 
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/splash/touch-icon-ipad-retina.png">

		<!--[if IE 9]>
			<style>
				.error-text {
					color: #333 !important;
				}
			</style>
		<![endif]-->

	</head>
	<body>
<!-- MAIN CONTENT -->
			<div id="content" style="min-height: 800px;">

				<!-- row -->
				<div class="row">
				
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
						<div class="row">
							<div class="col-sm-12">
								<div class="text-center error-box">
									<h1 class="error-text tada animated"><i class="fa fa-times-circle text-danger error-icon-shadow"></i> Error 500</h1>
									<h2 class="font-xl"><strong>Oooops, Something went wrong!</strong></h2>
									<br />
									<p class="lead semi-bold">
										<strong>You have experienced a technical error. We apologize.</strong><br><br>
										<small>
											We are working hard to correct this issue. Please wait a few moments and try your search again. <br> In the meantime, check out whats new on SmartAdmin:
										</small>
									</p>
									<ul class="error-search text-left font-md">
							            <li><a href="javascript:void(0);"><small>Go to My Dashboard <i class="fa fa-arrow-right"></i></small></a></li>
							            <li><a href="javascript:void(0);"><small>Contact SmartAdmin IT Staff <i class="fa fa-mail-forward"></i></small></a></li>
							            <li><a href="javascript:void(0);"><small>Report error!</small></a></li>
							            <li><a href="javascript:void(0);"><small>Go back</small></a></li>
							        </ul>
								</div>
				
							</div>
				
						</div>
				
					</div>
					
				</div>
				<!-- end row -->

			</div>
			<!-- END MAIN CONTENT -->
		</body>
		</html>