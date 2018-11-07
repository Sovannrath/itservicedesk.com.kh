@extends('layouts.user-master')
@section('page_title')
  Home
@endsection
@section('content')
<article class="col-sm-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="well">
          <div class="row">
            <!-- widget content -->
            <div class="col-md-3">
              <span> <!-- User image size is adjusted inside CSS, it should stay as is -->
                <img src="{{asset('img/avatars/sovannrath.jpg') }}" style="width: 150px; height:auto; border-radius:100px; border:5px solid #eee;" alt="me" class="" />
              </span>
              <table class="table"style="margin-top:20px">
                <tr><td>Operator ID</td><td>: OPT0001</td></tr>
                <tr><td>Name</td><td>: Sy Kosal</td></tr>
                <tr><td>Position</td><td>: ERP Project</td></tr>
              </table>
              <h2>Your Incidents</h2>
              <hr class="simple">
              <table class="table table-stripped table-hover">
                <thead><th>Incident ID</th><th>Subject</th><th>Status</th>
                </thead>
                <tbody>
                  
                  <tr>
                    <td></td><td></td><td>Open</td>
                  </tr>
                 
                </tbody>
              </table>
              <div><a href="{{url('/incidents/all')}}">Show All</a></div>
            </div>
            <div>
            </div>
            <div class="col-md-9">
                <div class="" style="padding-bottom:5px;">
                  <div style="float:left">Description</div>
                  <div style="float:right">Completion</div>
                </div>
                <hr>
  							<div class="row">
  								<div class="col-sm-8">
                    <table class="table">
                        <th>Incident ID</th>
                        <td>: CASE0000001</td>
                        <tr>
                        <th>Subject</th>
                        <td>: Network</td>
                      </tr>
                      <tr>
                        <th>Description</th>
                        <td>: My internet Connection is Error</td>
                      </tr>
                      <tr>
                        <th>Created Date</th>
                        <td>: 15-June-2018</td>
                      </tr>
                      <tr>
                        <th>Updated Date</th>
                        <td>: 29-June-2018</td>
                      </tr>
                      <tr>
                        <th>Status</th>
                        <td>: In-Progress</td>
                      </tr>
                  </table>
  								</div>
  								<div class="col-sm-4">
                    <ul class="list-inline">
      								<li>&nbsp;&nbsp;&nbsp;
      									<div class="easy-pie-chart txt-color-blue easyPieChart" data-percent="90" data-pie-size="150">
      										<span class="percent percent-sign txt-color-blue font-xl semi-bold">36</span>
      									</div>
      									&nbsp;&nbsp;&nbsp;
      								</li>
      							</ul>
                    </div>
  								</div>
                <hr>

  							<div class="row">
  								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
  									<div class="well well-sm well-light">
  										<h4 class="txt-color-blue">Active<a href="#" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
  										<br>
  										<div class="text-center">
  											<div style="font-size:50px;" class="txt-color-blue display-inline">

  											</div>
  										</div>
                      <hr class="simple">
                      <a href="#">More information</a>
  									</div>
  								</div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
  									<div class="well well-sm well-light">
  										<h4 class="txt-color-blue">Reject<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
  										<br>
                      <div class="text-center">
  											<div style="font-size:50px;" class="txt-color-blue display-inline">

  											</div>
  										</div>
                      <hr class="simple">
                      <a href="#">More information</a>
  									</div>
  								</div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
  									<div class="well well-sm well-light">
  										<h4 class="txt-color-blue">Resolved<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
  										<br>
                      <div class="text-center">
  											<div style="font-size:50px;" class="txt-color-blue display-inline">

  											</div>
  										</div>
                      <hr class="simple">
                      <a href="#">More information</a>

  									</div>
  								</div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
  									<div class="well well-sm well-light">
  										<h4 class="txt-color-blue">Closed<a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
  										<br>
                      <div class="text-center">
  											<div style="font-size:50px;" class="txt-color-blue display-inline">

  											</div>
  										</div>
                      <hr class="simple">
                      <a href="#">More information</a>

  									</div>
  								</div>
  							</div>

  						</div>
            </div>
        </div>
        <!-- end Well -->
</article>
<article class="col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget well" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">

          <header>
            <h2>Ticket Details </h2>
          </header>

          <!-- widget div-->
          <div>

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
              <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body">
              <hr class="simple">
              <ul id="myTab1" class="nav nav-tabs bordered">
                <li class="active">
                  <a href="#s1" data-toggle="tab">Activities <span class="badge bg-color-blue txt-color-white">12</span></a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-book"></i> Note</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-file-image-o"></i> Attachments</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-user"></i> Operator</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-cube"></i> Application Development</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-exchange"></i> Change Request</a>
                </li>
                <li>
                  <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-rss"></i> Service Management</a>
                </li>
                <li class="pull-right">
                  <a href="javascript:void(0);">
                  <div class="sparkline txt-color-pinkDark text-align-right" data-sparkline-height="18px" data-sparkline-width="90px" data-sparkline-barwidth="7">
                    5,10,6,7,4,3
                  </div> </a>
                </li>
              </ul>

              <div id="myTabContent1" class="tab-content padding-10">
                <div class="tab-pane fade in active" id="s1">
                  <table class="table table-bordered">
                      <th>Incident ID</th>
                      <td>CASE0000001</td>
                      <tr>
                      <th>Subject</th>
                      <td>Network</td>
                    </tr>
                    <tr>
                      <th>Description</th>
                      <td>My internet Connection is Error</td>
                    </tr>
                    <tr>
                      <th>Created Date</th>
                      <td>15-June-2018</td>
                    </tr>
                    <tr>
                      <th>Updated Date</th>
                      <td>29-June-2018</td>
                    </tr>
                    <tr>
                      <th>Status</th>
                      <td>In-Progress</td>
                    </tr>
                </table>
                </div>
                <div class="tab-pane fade" id="s2">
                  <p>
                    Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.
                  </p>
                </div>
                <div class="tab-pane fade" id="s3">
                  <p>
                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                  </p>
                </div>
                <div class="tab-pane fade" id="s4">
                  <p>
                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table.
                  </p>
                </div>
              </div>

            </div>
            <!-- end widget content -->

          </div>
          <!-- end widget div -->

        </div>
        <!-- end widget -->
</article>
@endsection
@section('custom-notification')
  @include('user.scripts.custom-notification')
@endsection
@section('jquery_popup')
  @include('user.scripts.jquery_popup')
@endsection
