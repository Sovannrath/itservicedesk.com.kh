<!DOCTYPE html>
<html lang="en-us" id="extr-page">
  <head>
    <meta charset="utf-8">
    <title>Login | Servi ce Desk</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- #CSS Links -->
    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- SmartAdmin Styles : Caution! DO NOT change the order -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production-plugins.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-production.min.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-skins.min.css') }}">

    <!-- SmartAdmin RTL Support -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/smartadmin-rtl.min.css') }}">

    <!-- We recommend you use "your_style.css" to override SmartAdmin
         specific styles this will also ensure you retrain your customization with each SmartAdmin update.
    <link rel="stylesheet" type="text/css" media="screen" href="css/your_style.css"> -->

    <!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/demo.min.css') }}">

    <!-- #FAVICONS -->
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon/favicon1.ico') }}" type="image/x-icon">

    <!-- #GOOGLE FONT -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- #APP SCREEN / ICONS -->
    <!-- Specifying a Webpage Icon for Web Clip
       Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
    <link rel="apple-touch-icon" href="{{ asset('img/splash/sptouch-icon-iphone.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/splash/touch-icon-ipad.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/splash/touch-icon-iphone-retina.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/splash/touch-icon-ipad-retina.png') }}">

    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Startup image for web apps -->
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="{{ asset('img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">

  </head>

  <body class="animated fadeInDown">

    <header id="header">

      <div id="logo-group">
        <span id="logo"></span>
      </div>

    </header>

    <div id="main" role="main">
      <div id="content" class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
            <h1 class="text-primary login-header-big"><strong>Employee Self-Service Portal</strong></h1>
            <div class="hero">

              <div class="pull-left login-desc-box-l">
                <h4 class="">Welcome to your employee self-service portal.</h4>
                <small>Please sign in with your credentials to continue</small>
              </div>

              <img src="img/demo/software.png" class="pull-right display-image" alt="" style="width:310px">

            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h5 class="about-heading">BIA System</h5>
                <p>
                  Business Intelligence Application (BIA) is a system to analyze and report on valuable business data is through spreadsheets.
                </p>
                <button class="btn btn-primary"> BIA System</button>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h5 class="about-heading">CRM System</h5>
                <p>
                  Customer Relationship Management (CRM) an applications designed to help businesses manage many of the following business processes...
                </p>
                <button class="btn btn-primary"> CRM System</button>
              </div>
            </div>

          </div>
          <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
            <div class="well no-padding">
              <form method="post" action="{{ url('login')}}" id="login-form" class="smart-form client-form">
                
                <header>
                  Sign In
                </header>
                <fieldset>
                  <section>
                    <label class="label">E-Mail Address</label>
                    <label class="input"> <i class="icon-append fa fa-user"></i>
                      <input type="email" name="email" value="{{ old('email') }}">
                      <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address</b></label>
                  </section>
                  <section>
                    <label class="label">Password</label>
                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                      <input type="password" name="password" name="password" required>
                      <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
                  </section>
                  <section>
                    <label class="checkbox">
                      <input type="checkbox" name="remember_token" {{ old('remember_token') ? 'checked' : '' }}>
                     Remember Me<i></i></label>
                  </section>
                  @if (count($errors) > 0)
                  <!-- Form Error List -->
                    <ul>
                      @foreach ($errors->all() as $error)
                      <p id="error"style="color:red">{{ $error }}</p>
                      @endforeach
                    </ul>
                    @endif
                    <div id="alert_message"class="flash-message" data-expires="5000">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                      @endforeach
                  </div> <!-- end .flash-message -->
                </fieldset>
                <footer>
                  <button type="submit" class="btn btn-primary" >
                    Sign In
                  </button>
                </footer>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--================================================== -->

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
    <script src="{{ asset('js/plugin/pace/pace.min.js') }}"></script>

      <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

      <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

    <!-- IMPORTANT: APP CONFIG -->
    <script src="{{ asset('js/app.config.js') }}"></script>

    <!-- JS TOUCH : include this plugin for mobile drag / drop touch events
    <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JQUERY VALIDATE -->
    <script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>

    <!-- JQUERY MASKED INPUT -->
    <script src="{{ asset('js/plugin/masked-input/jquery.maskedinput.min.js') }}"></script>

    <!--[if IE 8]>

      <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

    <![endif]-->

    <!-- MAIN APP JS FILE -->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <script type="text/javascript">
      runAllForms();

      $(function() {
        // Validation
        $("#login-form").validate({
          // Rules for form validation
          rules : {
            email : {
              required : true,
              email : true
            },
            password : {
              required : true,
              minlength : 6,
              maxlength : 20
            }
          },

          // Messages for form validation
          messages : {
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a VALID email address'
            },
            password : {
              required : 'Please enter your password'
            }
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
      });
    </script>

  </body>
</html>
