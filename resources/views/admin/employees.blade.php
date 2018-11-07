@extends('layouts.master')
@section('template_title')
Employee Accounts
@endsection
@section('style_css')
@include('admin.scripts.employees_ajax')
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
@endsection
@section('content')
<div id="content" style="margin-top:0px">
    <div class="row">
        {{-- col --}}
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                {{-- PAGE HEADER --}}
                <i class="fa-fw fa fa-home"></i>Employee Account
            </h1>
        </div>
        {{-- end col --}}
        {{-- col --}}
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <div class="pull-right">
            {{-- sparks --}}
            <a href="{{url('/employees/register')}}" title="Register New Employee"><button type="button" class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-user"></i></button></a>
                <a href="#" title="Follow Up"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-flag"></i></button></a>
                <a href="#" title="Print"><button class="btn btn-circle btn-lg btn-warning"><i class="glyphicon glyphicon-print"></i></button></a>
            {{-- end sparks --}}
            </div>
        </div>
        {{-- end col --}}
    </div>
    {{-- widget grid --}}
    <div id="widget-grid" class="">
        <div class="row">
	            {{-- Widget ID (each widget will need unique ID)--}}
                <div id="alert_message"class="flash-message" data-expires="5000">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                        @endif
                      @endforeach
                </div> {{-- end .flash-message --}}

	            <div class="jarviswidget">
                    <div class="widget-body" style="padding-top: 13px;">
                        <section class="regular">
                            @foreach($employees as $employee)
                            <div class="col-sm-3 col-xs-12" id="load-profile">
                                <a href="#"> <div id="Employee{{$employee->EmployeeID}}" data-value="{{$employee->EmployeeID}}">
                                    <center>
                                    @if($employee->ProfileImage != null)
                                    <img src="{{$employee->ProfileImage}}" style="border-radius:100%; height: 150px; width: 150px; border:5px solid #eee;" alt="Profile Image" class="" />
                                    @elseif($employee->Gender == 'F')
                                    <img class="img-responsive" src="{{asset('img/user-profile/Female.png') }}" style="border-radius:100%; max-width: 150px; border:5px solid #eee;" alt="Profile Image" class="" />
                                    @else($employee->Gender == 'M')
                                    <img class="img-responsive" src="{{asset('img/user-profile/Male.png') }}" style="border-radius:100%; max-width: 150px; border:5px solid #eee;" alt="Profile Image" class="" />
                                    @endif
                                    Employee ID : {{ $employee->EmployeeID}}<br>
                                    {{ $employee->FirstName}}
                                    {{ $employee->LastName}}<br>
                                    Department : {{ $employee->DepartmentID}}<br>
                                    {{ $employee->Email}}<br>
                                    </center>
                                </div>
                                </a>
                            </div>
                            @endforeach
                        </section>

                    </div>
                </div>
        </div>
        {{-- end row --}}
        <div class="row">
            {{-- Widget ID (each widget will need unique ID)--}}
            <div class="jarviswidget" data-widget-editbutton="false" data-widget-custombutton="false">
                <header>
                <span class="widget-icon"> <i class="fa fa-exclamation-circle"></i> </span>
                <h2>Employee Detail</h2>
                </header>
                {{-- widget div--}}
                <div>

                  {{-- widget edit box --}}
                  <div class="jarviswidget-editbox">
                    {{-- This area used as dropdown edit box --}}

                  </div>
                  {{-- end widget edit box --}}

                  {{-- widget content --}}
                  <div class="widget-body" id="emp_detail" style="min-height:420px">
                    <div class="col-sm-4">
                      <dl class="dl-horizontal">
                              <dt>Employee ID : </dt>
                              <dd><em></em></dd>
                              <dt>Business Partner Type :</dt>
                              <dd><em></em></dd>
                              <dt>First Name :</dt>
                              <dd><em></em></dd>
                              <dt>Middle Name :</dt>
                              <dd><em></em></dd>
                              <dt>Last Name :</dt>
                              <dd><em></em></dd>
                              <dt>Gender :</dt>
                              <dd><em></em></dd>
                              <dt>Job Title :</dt>
                              <dd><em></em></dd>
                              <dt>Position :</dt>
                              <dd><em></em></dd>
                              <dt>Department :</dt>
                              <dd><em></em></dd>
                      </dl>
                    </div>
                    <div class="col-sm-4">
                      <dl class="dl-horizontal">
                              <dt>Division ID : </dt>
                              <dd><em></em></dd>
                              <dt>Branch :</dt>
                              <dd><em></em></dd>
                              <dt>Manager :</dt>
                              <dd><em></em></dd>
                              <dt>User Code :</dt>
                              <dd><em></em></dd>
                              <dt>Sales Employee ID :</dt>
                              <dd><em></em></dd>
                              <dt>Business Unit ID :</dt>
                              <dd><em></em></dd>
                              <dt>Ref. Employee ID :</dt>
                              <dd><em></em></dd>
                              <dt>Email :</dt>
                              <dd><em></em></dd>
                              <dt>Extention :</dt>
                              <dd><em></em></dd>
                      </dl>
                    </div>
                    <div class="col-sm-4">
                      <div>
                          <img style="width: 150px; height:150px; border: 3px solid grey; border-radius: 100%;" id="blah" src="{{asset('img/user-profile/Female.png')}}" alt="your image" /></div>
                        <div class="upload-btn-wrapper">
                        </div>

                    </div>
                    <div class="col-sm-12">
                      <ul id="myTab1" class="nav nav-tabs bordered">
                        <li class="active">
                          <a href="#s1" data-toggle="tab"><i class="fa fa-fw fa-building"></i>Work Address</a>
                        </li>
                        <li>
                          <a href="#s2" data-toggle="tab"><i class="fa fa-fw fa-home"></i> Home Address</a>
                        </li>
                        <li>
                          <a href="#s3" data-toggle="tab"><i class="fa fa-fw fa-pencil"></i> Remark</a>
                        </li>
                        <li>
                          <a href="#s4" data-toggle="tab"><i class="fa fa-fw fa-user"></i> Administration</a>
                        </li>
                        <li>
                          <a href="#s5" data-toggle="tab"><i class="fa fa-fw fa-file"></i> Attachments</a>
                        </li>
                      </ul>
                      <div id="myTabContent1" class="tab-content padding-10">
                        <div class="tab-pane fade in active" id="s1">
                          <fieldset>
                            <dl class="dl-horizontal">
                              <dt>Work Street : </dt>
                              <dd><em></em></dd>
                              <dt>Work Street No :</dt>
                              <dd><em></em></dd>
                              <dt>Work Block :</dt>
                              <dd><em></em></dd>
                              <dt>Work Zip :</dt>
                              <dd><em></em></dd>
                              <dt>Work City :</dt>
                              <dd><em></em></dd>
                              <dt>Work Province :</dt>
                              <dd><em></em></dd>
                              <dt>Work Country :</dt>
                              <dd><em></em></dd>
                              <dt>Work State :</dt>
                              <dd><em></em></dd>
                          </dl>
                          </fieldset>
                        </div>
                        <div class="tab-pane fade" id="s2">
                          <fieldset>
                            <dl class="dl-horizontal">
                              <dt>Home Street : </dt>
                              <dd><em></em></dd>
                              <dt>Home Block :</dt>
                              <dd><em></em></dd>
                              <dt>Home Zip :</dt>
                              <dd><em></em></dd>
                              <dt>Home City :</dt>
                              <dd><em></em></dd>
                              <dt>Home Province :</dt>
                              <dd><em></em></dd>
                              <dt>Home Country :</dt>
                              <dd><em></em></dd>
                              <dt>Home State :</dt>
                              <dd><em></em></dd>
                          </dl>
                          </fieldset>
                        </div>
                        <div class="tab-pane fade" id="s3">
                          <fieldset>
                            <div class="form-group col-sm-12">
                                <p></p>
                            </div>
                          </fieldset>
                        </div>
                        <div class="tab-pane fade" id="s4">
                          <fieldset>
                            <dl class="dl-horizontal col-sm-4">
                              <dt>Admin Start Date : </dt>
                              <dd><em></em></dd>
                            </dl>
                            <dl class="dl-horizontal col-sm-4">
                              <dt style="width: 50%;">Admin Terminate Reason : </dt>
                              <dd><em></em></dd>
                            </dl>
                            <dl class="dl-horizontal col-sm-4">
                              <dt>Admin Duration : </dt>
                              <dd><em></em></dd>
                            </dl>
                          </fieldset>
                        </div>
                        <div class="tab-pane fade" id="s5">
                          <fieldset>
                            <label class="control-label" for="prepend">No Attach File</label><br>
                          </fieldset>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- end widget div --}}
            </div>
            {{-- end widget --}}
        </div>
	    {{-- end row --}}
    </div>
    {{-- end widget --}}
</div>
{{-- end content --}}
@endsection
@section('script')
<script type="text/javascript" src="{{asset('slick/slick.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.regular').slick({
        dots: false,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
  $("#smart-mod-eg1").click(function(e) {
            $.SmartMessageBox({
                title : "Smart Alert!",
                content : "This is a confirmation box. Can be programmed for button callback",
                buttons : '[No][Yes]'
            }, function(ButtonPressed) {
                if (ButtonPressed === "Yes") {

                    $.smallBox({
                        title : "Callback function",
                        content : " You pressed Yes...",
                        color : "#659265",
                        iconSmall : "fa fa-check fa-2x fadeInRight animated",
                        timeout : 4000
                    });
                }
                if (ButtonPressed === "No") {
                    $.smallBox({
                        title : "Callback function",
                        content : " You pressed No...",
                        color : "#C46A69",
                        iconSmall : "fa fa-times fa-2x fadeInRight animated",
                        timeout : 4000
                    });
                }

            });
            e.preventDefault();
        })
});
</script>
@endsection