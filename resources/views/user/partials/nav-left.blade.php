{{-- #NAVIGATION --}}
{{-- Left panel : Navigation area --}}
{{-- Note: This width of the aside area can be adjusted through LESS/SASS variables --}}
<aside id="left-panel">
  {{-- User info --}}
  <div class="login-info">
    <span> {{-- User image size is adjusted inside CSS, it should stay as it --}} 
      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        <img src="{{asset('img/user-profile/Male.png') }}" alt="me" class="online" /> 
        <span>
          @if(Session::has('user'))
          {{ Session::get('user.0.NameENG')}}
          @endif
        </span>
        <i class="fa fa-angle-down"></i>
      </a>   
    </span>
  </div>{{-- End User info --}}
  <nav>
    <ul>
      {{-- Home --}}
      <li class="{{ (\Request::route()->getName() == 'home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Dashboard</span></a>
      </li>
      {{-- Employee Register --}}
      <li class="{{ (\Request::route()->getName() == 'user.register') ? 'active' : '' }}">
        <a href="{{ route('user.register') }}" title="Employee Account"><i class="fa fa-lg fa-fw fa-group"></i> <span class="menu-item-parent">Employee Register</span></a>
      </li>
      {{-- Self Service --}}
      <li class="">
        <a href="#" title="Self-Service Portal"><i class="fa fa-lg fa-fw fa-tasks"></i> <span class="menu-item-parent">Self-Service Portal</span></a>
      </li>
      {{-- Leave Management --}}
    <li class="">
      <a href="http://sms.vital.com.kh/sms/" target="_blank" title="Leave Management"><i class="fa fa-lg fa-fw fa-book"></i> <span class="menu-item-parent">Leave Management</span></a>
    </li>
    {{-- Time and Attendance --}}
    <li class="">
      <a href="#" title="Time and Attendance"><i class="fa fa-lg fa-fw fa-calendar-o"></i> <span class="menu-item-parent">Time and Attendance</span></a>
    </li>
    {{-- Leave Management --}}
    <li class="">
      <a href="#" title="Adminstrator Management"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Administrator Mgt</span></a>
    </li>
    {{-- IT Service Desk --}}
    <li class="{{ (\Request::route()->getName() == 'servicedesk') || (\Request::route()->getName() == 'incident.create') ? 'active' : '' }}">
      <a href="{{ route('servicedesk') }}" title="IT Service Desk"><i class="fa fa-lg fa-fw fa-ticket"></i> <span class="menu-item-parent">IT Service Desk</span></a>
    </li>
    {{-- Notifiaction --}}
    <li class="">
      <a href="#" title="Notification"><i class="fa fa-lg fa-fw fa-bell-o"></i> <span class="menu-item-parent">Notifiaction</span></a>
    </li>
    {{-- Setup --}}
    <li class="{{ (\Request::route()->getName() == 'usersetup') ? 'active' : '' }}">
      <a href="{{ route('usersetup') }}" title="Setup"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">Setup</span></a>
    </li>
    {{-- Reports --}}
    <li class="">
      <a href="#" title="Reports"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Reports</span></a>
    </li>
  </ul>
  </nav>
    {{-- Minify Menu --}}
    <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i>
  </span>
</aside>
{{-- END NAVIGATION --}}
