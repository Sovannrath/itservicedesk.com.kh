<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>@yield('template_title') | IT Service Desk</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="author" content="">
	  	<meta name="csrf-token" content="{{ csrf_token() }}" />
	  	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		{{-- #CSS Links --}}
		{{-- Basic Styles --}}
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/font-awesome.min.css') }}">
		{{-- SmartAdmin Styles : Caution! DO NOT change the order --}}
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/smartadmin-production-plugins.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/smartadmin-production.min.css') }}">
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/smartadmin-skins.min.css') }}">
		
		{{-- SmartAdmin RTL Support --}}
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/smartadmin-rtl.min.css')}}">
		{{-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp --}}
		<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/demo.min.css') }}">
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('UserSite/css/enduser-custom.css') }}">
        @yield('style')

		{{-- #FAVICONS --}}
		<link rel="shortcut icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">

		{{-- #GOOGLE FONT --}}
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		{{-- #APP SCREEN / ICONS --}}
		{{-- Specifying a Webpage Icon for Web Clip Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html --}}
		<link rel="apple-touch-icon" href="{{ asset('img/splash/sptouch-icon-iphone.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/splash/touch-icon-ipad.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/splash/touch-icon-iphone-retina.png') }}">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/splash/touch-icon-ipad-retina.png') }}">

		{{-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance --}}
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		{{-- Startup image for web apps --}}
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="{{ asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">
	</head>
    @foreach(App\AppSetUp::getAppSetup() as $SetUp)

    @php
    $theme = $SetUp->ThemeName;
    $layout = $SetUp->Layouts;
    $other_opt = $SetUp->OtherOpt;
    $layouts = json_decode($layout, true);
    $fh = $layouts[0]['fh'];
    $fn = $layouts[0]['fn'];
    $fr = $layouts[0]['fr'];
    $ff = $layouts[0]['ff'];
    $ic = $layouts[0]['ic'];
    $rtl = $layouts[0]['rtl'];
    $mot = $layouts[0]['mot'];
    $space = '';
    if($fh !== null){
    $space = ' ';
    }elseif($fn !== null){
    $space = ' ';
    }elseif($fr !== null){
    $space !== ' ';
    }elseif($ff !== null){
    $space = ' ';
    }elseif($ic !== null){
    $space = ' ';
    }elseif($rtl !== null){
    $space = ' ';
    }elseif($mot !== null){
    $space = ' ';
    }elseif($theme !== null){
    $space = ' ';
    }elseif($other_opt !== null){
    $space = ' ';
    }

    @endphp
	<body class="{{$space.$mot}}{{$space.$theme}}{{$space.$other_opt}}{{$space.$rtl}}{{$space.$fh}}{{$space.$fn}}{{$space.$fr}}{{$space.$ff}}{{$space.$ic}}">
	@endforeach
    @include('user.partials.nav-left')
		@include('user.partials.nav-head')

		{{-- #MAIN PANEL --}}
		<div id="main" role="main">
			{{-- RIBBON --}}
			<div id="ribbon">
				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>
				{{-- breadcrumb --}}
				<ol class="breadcrumb">
					<li>Home</li><li>@yield('page_title')</li><li>@yield('sub_title')</li>
				</ol>
				{{-- end breadcrumb --}}
			</div>
			{{-- END RIBBON --}}

			{{-- #MAIN CONTENT --}}
				@yield('content')
			{{-- END #MAIN CONTENT --}}

		{{-- END #MAIN PANEL --}}

{{--================================================== --}}

{{-- #PLUGINS --}}
{{-- Link to Google CDN's jQuery + jQueryUI; fall back to local --}}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	if (!window.jQuery) {
		document.write("<script src='UserSite/js/libs/jquery-3.2.1.min.j'><\/script>");
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
	if (!window.jQuery.ui) {
		document.write("<script src='UserSite/js/libs/jquery-ui.min.js'><\/script>");
	}
</script>
{{-- IMPORTANT: APP CONFIG --}}
<script src="{{ asset('UserSite/js/app.config.js') }}"></script>
{{-- JS TOUCH : include this plugin for mobile drag / drop touch events--}}
<script src="{{ asset('UserSite/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js') }}"></script> 
{{-- BOOTSTRAP JS --}}
<script src="{{ asset('UserSite/js/bootstrap/bootstrap.min.js') }}"></script>
{{-- CUSTOM NOTIFICATION --}}
<script src="{{ asset('UserSite/js/notification/SmartNotification.min.js')}}"></script>
{{-- browser msie issue fix --}}
<script src="{{ asset('UserSite/js/plugin/msie-fix/jquery.mb.browser.min.js') }}"></script>
{{-- FastClick: For mobile devices --}}
<script src="{{ asset('UserSite/js/plugin/fastclick/fastclick.min.js') }}"></script>
{{-- MAIN APP JS FILE --}}
<script src="{{ asset('UserSite/js/app.min.js') }}"></script>
{{-- Demo purpose only --}}
<script src="{{ asset('/js/demo.min.js')}}"></script>
{{-- JARVIS WIDGETS --}}
<script src="{{asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>
@yield('script')
</body>
</html>
