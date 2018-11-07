@extends('layouts.user-master')
@section('page_title')
  Home
@endsection
@section('content')

{{-- MAIN CONTENT --}}
<div id="content">
	{{-- row --}}
	<div class="row">
		
		
		{{-- col --}}
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				
				{{-- PAGE HEADER --}}
				<i class="fa-fw fa fa-home"></i> 
					Dashboard 
				<span>>  
					Marketing
				</span>
			</h1>
		</div>
		{{-- end col --}}
		{{-- right side of the page with the sparkline graphs --}}
		{{-- col --}}
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
			
		</div>
		{{-- end col --}}
		
	</div>
	{{-- end row --}}

	{{-- widget grid --}}
	<section id="widget-grid" class="">

		{{-- row --}}
		<div class="row">
			
			{{-- NEW WIDGET START --}}
			<article class="col-xs-12 col-sm-6">
				
				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-facebook txt-color-blue"></i> </span>
						<h2>Facebook overview</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body no-padding">
							
							{{-- this is what the user will see --}}
							<div class="row">
								<div class="col-sm-4 col-md-2 col-md-offset-1 text-center">
									<h3 class="margin-bottom-0">
										50
										<i class="fa fa-caret-down icon-color-bad"></i>
										<small class="icon-color-bad">6%</small>
										<br>
										<small class="font-xs"><sup><span class="badge bg-color-red">Reach</span></sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										264
										<i class="fa fa-caret-up icon-color-good"></i>
										<small class="icon-color-good">9%</small>
										<br>
										<small class="font-xs"><sup><span class="badge bg-color-greenLight">Views</span></sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										112
										<i class="fa fa-caret-down icon-color-bad"></i>
										<small class="icon-color-bad">4%</small>
										<br>
										<small class="font-xs"><sup><span class="badge">Enagaged</span></sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										1430
										<br>
										<small class="font-xs"><sup><span class="badge bg-color-blue">Clicks</span></sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										73
										<i class="fa fa-caret-down icon-color-bad"></i>
										<small class="icon-color-bad">12%</small>
										<br>
										<small class="font-xs"><sup><span class="badge bg-color-orange">Likes</span></sup></small>
									</h3>
								</div>


							</div>

							<hr class="margin-5">

							<div id="saleschart" class="chart"></div>

						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

			</article>
			{{-- WIDGET END --}}

			{{-- NEW WIDGET START --}}
			<article class="col-xs-12 col-sm-6">
				
				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget jarviswidget-color-blueDark" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-twitter txt-color-blueLight"></i> </span>
						<h2>Twitter Analytics</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body no-padding">
							
							{{-- this is what the user will see --}}
							<div class="row">
								<div class="col-sm-4 col-md-2 col-md-offset-1 text-center">
									<h3 class="margin-bottom-0">
										750
										<br>
										<small class="font-xs"><sup>Tweets</sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										189
										<br>
										<small class="font-xs"><sup>Following</sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										346
										<br>
										<small class="font-xs"><sup>Followers</sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										50
										<br>
										<small class="font-xs"><sup>Listed</sup></small>
									</h3>
								</div>
								<div class="col-sm-4 col-md-2 text-center">
									<h3 class="margin-bottom-0">
										0
										<br>
										<small class="font-xs"><sup>Favorites</sup></small>
									</h3>
								</div>
							</div>

							<hr class="margin-5">

							<div id="linechart" class="chart"></div>


						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

			</article>
			{{-- WIDGET END --}}

		</div>	

		<div class="row">
			{{-- NEW WIDGET START --}}
			<article class="col-xs-12 col-sm-4">
				
				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-facebook text-primary"></i> </span>
						<h2>Facebook Usermap</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body no-padding">
							
							{{-- this is what the user will see --}}
							<div id="vector-map" class="vector-map"></div>

						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-facebook text-primary"></i> </span>
						<h2>Facebook Age Group</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body">
							
							{{-- this is what the user will see --}}
							<canvas id="pieChart" height="120"></canvas>

						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

			</article>
			{{-- WIDGET END --}}

			{{-- NEW WIDGET START --}}
			<article class="col-xs-12 col-sm-4">
				
				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id=""	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<h2>Traffic Sources</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body no-padding">
							
							{{-- this is what the user will see --}}

							{{-- table responsive --}}
							<div class="table-responsive no-margin custom-scroll" style="height:300px; overflow-y: scroll;"> 
								
								<table class="table highlight table-border-0 table-hover table-condensed">
									<thead>
										<tr>
											<th>URL</th>
											<th class="hidden-xs" colspan="2">Views</th>
											<th class="">Percentage</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">USA</a></td>
											<td class="hidden-xs"> 26 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 12%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 45%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Canada</a></td>
											<td class="hidden-xs"> 17 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 6%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 20%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Brazil</a></td>
											<td class="hidden-xs"> 3</td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 1%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 10%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Australia</a></td>
											<td class="hidden-xs">1 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 2.5%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 6%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">China</a></td>
											<td class="hidden-xs"> 0 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-bad"><i class="fa fa-caret-down"></i> 3%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 6%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Turkey</a></td>
											<td class="hidden-xs"> 5 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 0%</span></td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 5%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Bangladesh</a></td>
											<td class="hidden-xs"> 8 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-bad"><i class="fa fa-caret-down"></i> 7%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 3%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">India</a></td>
											<td class="hidden-xs"> 13 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-good"><i class="fa fa-caret-up"></i> 1%</span></td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 3%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Burma</a></td>
											<td class="hidden-xs"> 1 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-bad"><i class="fa fa-caret-down"></i> 4%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 2%;"></div>
												</div>
											</td>
										</tr>
										<tr>
											<td class="v-align-m"><a href="javascript:void(0);">Tunisia</a></td>
											<td class="hidden-xs"> 0 </td>
											<td class="hidden-xs v-align-m"> <span class="icon-color-bad"><i class="fa fa-caret-down"></i> 0%</span> </td>
											<td class="v-align-m">
												<div class="progress progress-xs no-margin">
													<div class="progress-bar progress-primary" role="progressbar" style="width: 2%;"></div>
												</div>
											</td>
										</tr>																	
									</tbody>
								</table>
								
							</div>
							{{-- end table responsive--}}

						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-linkedin text-info"></i> </span>
						<h2>Linkedin Followers</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body">
							
							{{-- this is what the user will see --}}
							<h2 class="text-center">
								89,024
								<i class="fa fa-caret-up icon-color-good"></i>
								<small class="icon-color-good">6%</small>
								<br>
								<small class="font-xs"><sup>Followers</sup></small>
							</h2>

							<div class="sparkline" 
							data-sparkline-type="line" 
							data-fill-color="#9ad2ec" 
							data-sparkline-line-color="#007bb6" 
							data-sparkline-spotradius="5" 
							data-sparkline-width="100%" 
							data-sparkline-height="107px">-1,4,3,5,2,4,5,4,5,4,3,3,4,6</div> 
							<h5 class="air air-bottom-left padding-10 font-md text-danger">-12.<small class="ultra-light text-danger">45 <i class="fa fa-caret-down fa-lg"></i></small></h5>
						
						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

			</article>	

			{{-- NEW WIDGET START --}}
			<article class="col-xs-12 col-sm-4">
				
				{{-- Widget ID (each widget will need unique ID)--}}
				<div class="jarviswidget" id="" 
						data-widget-colorbutton="false"	
						data-widget-editbutton="false" 
						data-widget-togglebutton="false" 
						data-widget-deletebutton="false" 
						data-widget-fullscreenbutton="false" 
						data-widget-custombutton="false" 
						data-widget-collapsed="false" 
						data-widget-sortable="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-twitter text-info"></i> </span>
						<h2>Latest tweets</h2>				
						
					</header>

					{{-- widget div--}}
					<div>
						
						{{-- widget edit box --}}
						<div class="jarviswidget-editbox">
							{{-- This area used as dropdown edit box --}}
							<input class="form-control" type="text">	
						</div>
						{{-- end widget edit box --}}
						
						{{-- widget content --}}
						<div class="widget-body no-padding">
							
							{{-- this is what the user will see --}}
							<div class="chat-body custom-scroll" style="height: 599px !important;">
								<ul>
									<li class="message margin-bottom-10">
										<img src="img/avatars/5.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">Sadi Orlaf</a> 
											<span class="font-xs">
											Leverage agile frameworks to provide a robust synopsis for high level overviews #overpower
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time> 
										</div>
									</li>
									<li class="message margin-bottom-10">
										<img src="img/avatars/1.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">Jessica Dodalf</a> 
											<span class="font-xs">
											Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition @yura 
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time>
										</div>
									</li>
									<li class="message margin-bottom-10">
										<img src="img/avatars/3.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">Zekarburg Almandalie</a> 
											<span class="font-xs">
											Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time>
										</div>
									</li>
									<li class="message margin-bottom-10">
										<img src="img/avatars/4.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">Barley Krazurkth</a> 
											<span class="font-xs">
											Bring to the table win-win survival strategies to ensure proactive domination.
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time>
										</div>
									</li>
									<li class="message margin-bottom-10">
										<img src="img/avatars/female.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">Farhana Amrin</a> 
											<span class="font-xs">
											Going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time>
										</div>
									</li>
									<li class="message margin-bottom-10">
										<img src="img/avatars/2.png" alt="" class="img-circle">
										<div class="message-text">
											<a href="javascript:void(0);" class="username txt-color-blueDark">GoatCloud</a> 
											<span class="font-xs">
											User generated content in real-time will have multiple touchpoints for offshoring.
											</span>
											<time class="p-relative d-block margin-top-5"> 2017-01-13 </time>
										</div>
									</li>
									<li class="v-align-m text-align-center">
										<a href="javascript:void(0);" class="btn btn-primary no-margin btn-xs">Load more</a>
									</li>
								</ul>
							</div>

						</div>
						{{-- end widget content --}}
						
					</div>
					{{-- end widget div --}}
					
				</div>
				{{-- end widget --}}

			</article>
			{{-- WIDGET END --}}
			
		</div>

		{{-- end row --}}

	</section>
	{{-- end widget grid --}}

</div>
{{-- END MAIN CONTENT --}}

@endsection
@section('script')
@include('user.scripts.chart-script')
{{-- EASY PIE CHARTS --}}
<script src="{{asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
{{-- SPARKLINES --}}
<script src="{{asset('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>
{{-- PAGE RELATED PLUGIN(S) --}}
<script src="{{asset('UserSite/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/chartjs/chart.min.js') }}"></script>
<script src="{{asset('UserSite/js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>
@endsection