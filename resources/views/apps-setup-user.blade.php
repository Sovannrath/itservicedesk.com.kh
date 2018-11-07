@extends('layouts.user-master')
@section('page_title')
Setup
@endsection
@section('content')

<div id="content">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1 class="page-title txt-color-blueDark">
          {{-- PAGE HEADER --}}
          <i class="fa-fw fa fa-home"></i>Setup
          
          <span class="pull-right" style="padding-top:0px;">
							
          </span>
        </h1>
      </div>
    </div>
	{{-- Widget ID (each widget will need unique ID)--}}
    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
      {{-- widget div--}}
      <div>
          {{-- widget edit box --}}
          <div class="jarviswidget-editbox">
            {{-- This area used as dropdown edit box --}}
          </div>{{-- end widget edit box --}}

          {{-- widget content --}}
          <div class="widget-body" style="min-height:850px">
          	<form id="" class="form-horizontal" method="POST" action="{{route('setup')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <h2>Setup Preferences</h2>
              <hr>
              <div class="col-sm-12 col-md-12 col-lg-12">
                <fieldset>
                  <div id="alert_message"class="flash-message" data-expires="5000">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                      @endforeach
                  </div> {{-- end .flash-message --}}
                </fieldset>
                <fieldset>
                	<div class="well well-sm well-light">
                		@if(count(App\AppSetUp::getAppSetup()) == 0)
                		<div class="form-group">
                			<!-- <h4 class="txt-color-blue">Select Theme</h4>
                			<hr class="simple"> -->
                			<label class="col-md-2 control-label">Select Theme</label>
								<div class="col-md-10">
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-0" type="radio" checked="checked">
												Smart Default </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-1" type="radio">
												Dark Elegance </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-2" type="radio">
												Ultra Light </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-3" type="radio">
												Google Skin </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-4" type="radio">
												Pixel Smash </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-5" type="radio">
												Glass </label>
										</div>
										<div class="radio">
											<label>
												<input name="theme" value="smart-style-6" type="radio">
												Material Design </label>
										</div>
									</div>
								</div>

								<hr class="simple">
		                		<div class="form-group">
									<label class="col-md-2 control-label">Choose Layout Option</label>
										<div class="col-md-10">
											<label class="checkbox-inline">
												<input name="fixed_header" value="fixed-header" type="checkbox">
												Fixed Header </label>
											<label class="checkbox-inline">
												<input name="fixed_navigation" value="fixed-navigation" type="checkbox">
												Fixed Navigation </label>
											<label class="checkbox-inline">
												<input name="fixed_ribbon" value="fixed-ribbon" type="checkbox">
												Fixed Ribbon </label>
											<label class="checkbox-inline">
												<input name="fixed_page_footer" value="fixed-page-footer" type="checkbox">
												Fixed Footer </label>
											<label class="checkbox-inline">
												<input name="container" value="container" type="checkbox">
												Inside <b>.container</b> </label>
											<label class="checkbox-inline">
												<input name="rtl_support" value="smart-rtl" type="checkbox">
												RTL Support </label>
											<label class="checkbox-inline">
												<input name="menu_on_top" value="menu-on-top" type="checkbox" >
												Menu on <b>top</b> </label>

												<label>{{ $setup->SetUpID}}</label>
									
										</div>
								</div>
								@else
									@foreach(App\AppSetUp::getAppSetup() as $setup)
									<div class="form-group">
			                			<!-- <h4 class="txt-color-blue">Select Theme</h4>
			                			<hr class="simple"> -->
			                			<label class="col-md-2 control-label">Select Theme</label>
											<div class="col-md-10">
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-0" type="radio" {{ ($setup->ThemeName) == 'smart-style-0' ? 'checked' : ''}}>
														Smart Default </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-1" type="radio" {{ ($setup->ThemeName) == 'smart-style-1' ? 'checked' : ''}}>
														Dark Elegance </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-2" type="radio" {{ ($setup->ThemeName) == 'smart-style-2' ? 'checked' : ''}}>
														Ultra Light </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-3" type="radio" {{ ($setup->ThemeName) == 'smart-style-3' ? 'checked' : ''}}>
														Google Skin </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-4" type="radio" {{ ($setup->ThemeName) == 'smart-style-4' ? 'checked' : ''}}>
														Pixel Smash </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-5" type="radio" {{ ($setup->ThemeName) == 'smart-style-5' ? 'checked' : ''}}>
														Glass </label>
												</div>
												<div class="radio">
													<label>
														<input name="theme" value="smart-style-6" type="radio" {{ ($setup->ThemeName) == 'smart-style-6' ? 'checked' : ''}}>
														Material Design </label>
												</div>
											</div>
										</div>

										<hr class="simple">
										@php
										$layout = $setup->Layouts;
										$layouts = json_decode($layout, true);
										$fh = $layouts[0]['fh'];
										$fn = $layouts[0]['fn'];
										$fr = $layouts[0]['fr'];
										$ff = $layouts[0]['ff'];
										$ic = $layouts[0]['ic'];
										$rtl = $layouts[0]['rtl'];
										$mot = $layouts[0]['mot'];
										@endphp
										<div class="form-group">
											<label class="col-md-2 control-label">Choose Layout Option</label>
											<div class="col-md-10">
												<label class="checkbox-inline">
													<input name="fixed_header" value="fixed-header" type="checkbox" {{ $fh == 'fixed-header' ? 'checked' : '' }}>
													Fixed Header </label>
												<label class="checkbox-inline">
													<input name="fixed_navigation" value="fixed-navigation" type="checkbox" {{ $fn == 'fixed-navigation' ? 'checked' : '' }}>
													Fixed Navigation </label>
												<label class="checkbox-inline">
													<input name="fixed_ribbon" value="fixed-ribbon" type="checkbox" {{ $fr == 'fixed-ribbon' ? 'checked' : '' }}>
													Fixed Ribbon </label>
												<label class="checkbox-inline">
													<input name="fixed_page_footer" value="fixed-page-footer" type="checkbox" {{ $ff == 'fixed-page-footer' ? 'checked' : '' }}>
													Fixed Footer </label>
												<label class="checkbox-inline">
													<input name="container" value="container" type="checkbox" {{ $ic == 'container' ? 'checked' : '' }}>
													Inside <b>.container</b> </label>
												<label class="checkbox-inline">
													<input name="rtl_support" value="smart-rtl" type="checkbox" {{ $rtl == 'smart-rtl' ? 'checked' : '' }}>
													RTL Support </label>
												<label class="checkbox-inline">
													<input name="menu_on_top" value="menu-on-top" type="checkbox" {{ $mot == 'menu-on-top' ? 'checked' : '' }}>
													Menu on <b>top</b> </label>
											
											</div>
										</div>
										<hr class="simple">
										<div class="form-group">
											<label class="col-md-2 control-label">Other Option</label>
											<div class="col-md-10">
												<div class="class="radio"">
													<label class="radio radio-inline">
													<input name="other_option" value="" type="radio" checked="checked">
														None</label>
													<label class="radio radio-inline">
													<input name="other_option" value="minified" type="radio" {{ ($setup->OtherOpt == 'minified') ? 'checked' : '' }}>
														Minify the navigation menu</label>
													<label class="radio radio-inline">
													<input name="other_option" value="hidden-menu" type="radio" {{ ($setup->OtherOpt == 'hidden-menu') ? 'checked' : '' }}>
														Hide the navigation menu</label>
												</div>
											</div>
										</div>
										@endforeach
									@endif
					</div>{{-- End form well --}}
	          </fieldset>
              <!-- <div class="col-sm-12 col-md-2 col-lg-2">
                  <center>
                    <img style="max-height: 150px; max-width: 150px;" class="img-responsive img-circle" id="preview" src="/img/user-profile/Male.png" alt="Profile Image" />
                      <div class="upload-btn-wrapper">
                      <input type="file" name="profile_img" id="image" style="display:none"class="form-control"/>
                      <a href="javascript:changeProfile();">Change</a> |
                          <a style="color: red" href="javascript:removeImage()">Remove</a>
                          <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                      {{-- <input type="file" onchange="readURL(this);" name="profile_img" />--}}
                    </div>
                </center>
              </div>
              <div class="col-sm-12"> -->
                <br/>
                <footer>
                  <button type="submit" class="btn btn-primary">
                      Save
                  </button>
                </footer>
              </div>
            </form> 
                   
	      </div>{{-- end widget-body --}}        
      </div>
      {{-- end widget div --}} 
    </div>{{-- end jarviswidget --}}   
</div>
{{-- end content --}}

@endsection