{{-- #PLUGINS --}}
{{-- Link to Google CDN's jQuery + jQueryUI; fall back to local --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script>
  if (!window.jQuery) {
    document.write('<script src="js/libs/jquery-3.2.1.min.js"><\/script>');
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
  if (!window.jQuery.ui) {
    document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');
  }
</script>
{{-- IMPORTANT: APP CONFIG --}}
<script src="{{ asset('js/app.config.js') }}"></script>
{{-- BOOTSTRAP JS --}}
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
{{-- CUSTOM NOTIFICATION --}}
<script src="{{ asset('js/notification/SmartNotification.min.js') }}"></script>
{{-- JARVIS WIDGETS --}}
<script src="{{ asset('js/smartwidgets/jarvis.widget.min.js') }}"></script>
{{-- EASY PIE CHARTS --}}
<script src="{{ asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
{{-- JQUERY VALIDATE --}}
<script src="{{ asset('js/plugin/jquery-validate/jquery.validate.min.js') }}"></script>
{{-- FastClick: For mobile devices --}}
<script src="{{ asset('js/plugin/fastclick/fastclick.min.js') }}"></script>
{{--[if IE 8]>
  <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
[endif]--}}
{{-- Demo purpose only --}}
<script src="{{ asset('js/demo.min.js') }}"></script>
{{-- MAIN APP JS FILE --}}
<script src="{{ asset('js/app.min.js') }}"></script>
