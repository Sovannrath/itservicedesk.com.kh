
<!DOCTYPE html>
<html lang="en-us">
@include('admin.partials.head')
	{{-- #BODY --}}
@if(count(App\AppSetUp::getAppSetup()) > 0)
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
@endif
		{{-- #HEADER --}}
			@include('admin.partials.dashboard-header')
		{{-- END HEADER --}}

		{{-- #NAVIGATION --}}
		{{-- Left panel : Navigation area --}}
		{{-- Note: This width of the aside area can be adjusted through LESS/SASS variables --}}
			@include('admin.partials.left-panel')
		{{-- END NAVIGATION --}}

		{{-- #MAIN PANEL --}}
		<div id="main" role="main">
			{{-- RIBBON  --}}
			<div id="ribbon">
				<ol class="breadcrumb">
					<li>Home</li><li>@yield('template_title')</li><li>@yield('sub_title')</li>
				</ol>
				{{-- You can also add more buttons to the ribbon for further usability
				Example below: --}}
			</div>
			{{--END RIBBON --}}

			{{-- Main contents)--}}
				@yield('content')
			{{-- END #MAIN PANEL --}}

			@include('admin.partials.footer')
			{{-- #SHORTCUT AREA : With large tiles (activated via clicking user name tag)
			 Note: These tiles are completely responsive, you can add as many as you like --}}
			<div id="shortcut">
				<ul>
					<li>
						<a href="#" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
					</li>
				</ul>
			</div>
			{{-- END SHORTCUT AREA --}}
		</div>
		@include('admin.scripts.script')
		@yield('jquery_popup')
		@yield('script')
	</body>
</html>
