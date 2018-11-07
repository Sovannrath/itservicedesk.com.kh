<head>
  <meta charset="utf-8">
  <title>@yield('template_title') | IT Service Desk</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  {{-- #CSS Links --}}
  {{-- Basic Styles --}}
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}">

  {{-- SmartAdmin Styles : Caution! DO NOT change the order --}}
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}">
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}">

  {{-- SmartAdmin RTL Support --}}
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-rtl.min.css') }}">

  {{-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp --}}
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/demo.min.css') }}">
    {{-- Custom Style --}}
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/nvc-custom.css') }}">
  {{-- #FAVICONS --}}
  <link rel="shortcut icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">

  {{-- #GOOGLE FONT --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

  {{-- #APP SCREEN / ICONS --}}
  {{-- Specifying a Webpage Icon for Web Clip
     Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html --}}
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
  @yield('style_css')

</head>