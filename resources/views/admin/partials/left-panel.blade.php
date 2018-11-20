<aside id="left-panel">
  {{-- User info --}}
  <div class="login-info">
    <span> {{-- User image size is adjusted inside CSS, it should stay as it --}}
      <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
        @php
          $Email = Session::get('user.0.EmailID');
          $Employee = App\Employee::getEmployeeByEmail($Email);
        @endphp
          @if(!$Employee)
          <img src="{{asset('img/user-profile/Male.png')}}" alt="me" class="online" />
          @elseif($Employee->ProfileImage != '')
          <img src="{{$Employee->ProfileImage}}" alt="me" class="online" />
          @else
          <img src="{{asset('img/user-profile/Male.png')}}" alt="me" class="online" />
          @endif
        <span>
          @if(Session::has('user.0.NameENG'))
            {{ Session::get('user.0.NameENG')}}
          @endif
        </span>
        <i class="fa fa-angle-down"></i>
      </a>
    </span>
  </div>
  {{-- end user info --}}

  {{-- NAVIGATION : This navigation is also responsive To make this navigation dynamic please make sure to link the node (the reference to the nav > ul) after page load. Or the navigation will not initialize. --}}
  <nav>
  {{--  NOTE: Notice the gaps after each icon usage <i></i>.. Please note that these links work a bit different than traditional href="" links. See documentation for details. --}}
    <ul>
      {{-- Dashboard --}}
      <li class="{{ (\Request::route()->getName() == 'dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard' )}}" title="Dashboard"><i class="fa fa-lg fa-fw fa-dashboard"></i><span class="menu-item-parent">Dashboard</span></a>
      </li>
      {{-- Employee Account --}}
      <li class="{{ (\Request::route()->getName() == 'employees') ? 'active' : '' }}">
        <a href="{{ route('employees')}}" title="Employee Account"><i class="fa fa-lg fa-fw fa-group"></i><span class="menu-item-parent">Employee Account</span></a>
      </li>
      {{-- Incidents Management --}}
      <li class="{{ (\Request::route()->getName() == 'incidents' || \Request::route()->getName() == 'edit.incident') ? 'active' : '' }}">
        <a href="#" title="Incidents Managemet"><i class="fa fa-lg fa-fw fa-question-circle"></i> <span class="menu-item-parent">Incident Management</span></a>
          <ul>
              <li class="{{ (\Request::route()->getName() == 'create.incident') ? 'active' : '' }}">
              <a href="{{route('create.incident')}}" title="Create incident"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">New Incident</span></a>
              </li>
              <li class="{{ (\Request::route()->getName() == 'incidents' || \Request::route()->getName() == 'edit.incident') ? 'active' : '' }}">
              <a href="{{route('incidents')}}" title="All incidents"><i class="fa fa-lg fa-fw fa-list-alt"></i> <span class="menu-item-parent">All Incidents</span></a>
              </li>
              <li class="{{ (\Request::route()->getName() == 'investigate' || \Request::route()->getName() == 'investigate.create' || \Request::route()->getName() == 'investigate-case.create') ? 'active' : '' }}">
                  <a href="{{route('investigate')}}" title="ERP Consultant"><i class="fa fa-lg fa-fw fa-crosshairs"></i> <span class="menu-item-parent">Investigation</span></a>
              </li>
              <li class="{{ (\Request::route()->getName() == 'complaint') ? 'active' : '' }}">
                  <a href="{{route('complaint')}}" title="User complaint"><i class="fa fa-lg fa-fw fa-comments"></i> <span class="menu-item-parent">User Complaint</span></a>
              </li>
          </ul>
      </li>
        {{-- Tickets Management --}}
        <li class="{{ (\Request::route()->getName() == 'tickets' || \Request::route()->getName() == 'ticket.create') ? 'active' : '' }}">
            <a href="#" title="Incidents Managemet"><i class="fa fa-lg fa-fw fa-ticket"></i> <span class="menu-item-parent">Ticket Management</span></a>
            <ul>
                <li class="{{ (\Request::route()->getName() == 'ticket.create') ? 'active' : '' }}">
                    <a href="{{route('ticket.create')}}" title="Create incident"><i class="fa fa-lg fa-fw fa-pencil"></i> <span class="menu-item-parent">New Ticket</span></a>
                </li>
            </ul>
        </li>
      {{-- Services Management --}}
      <li>
        <a href="#" title="Services Management"><i class="fa fa-lg fa-fw fa-rss"></i> <span class="menu-item-parent">Service Management</span></a>
          <ul>
            <li class="{{ (Request::is('nvc/app-dev') ? 'active' : '') }}">
              <a href="{{url('nvc/app-dev')}}" title="App Develop Request"><i class="fa fa-lg fa-fw fa-external-link-square"></i> <span class="menu-item-parent">Peripheral Request</span></a>
            </li>
            <li class="(Request::is('nvc/erp-consult') ? 'active' : '') }}">
              <a href="{{url('nvc/erp-consult')}}" title="ERP Consultant"><i class="fa fa-lg fa-fw fa-external-link-square"></i> <span class="menu-item-parent">ERP Consult</span></a>
            </li>
          </ul>
      </li>
      {{-- App Development --}}
      <li>
        <a href="#" title="Application Development"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">App Development</span></a>
        <ul>
          <li>
            <a href="{{ url('nvc/app-develop/new')}}" title="Request Application Develop"> Request Application Develop</a>
          </li>
        </ul>
      </li>
      {{-- Change Request --}}
      <li>
        <a href="#" title="Change Request Management"><i class="fa fa-lg fa-fw fa-exchange"></i> <span class="menu-item-parent">Change Management</span></a>
          <ul>
            <li>
              <a href="{{ url('nvc/change-request/new')}}" title="Change Request"> Create Change Request</a>
            </li>
            <li {{{ (Request::is('nvc/change-request/all') ? 'class=active' : '') }}}>
              <a href="{{ url('nvc/change-request/all')}}" title="Change Request"> All Change Request</a>
            </li>
          </ul>
      </li>
      {{-- Notification --}}
      <li>
        <a href="#" title="Report Management"><i class="fa fa-lg fa-fw fa-bell"></i> <span class="menu-item-parent">Notification</span></a>
      </li>
      {{-- Setup --}}
      <li>
          <a href="#" title="Services Management"><i class="fa fa-lg fa-fw fa-cog"></i> <span class="menu-item-parent">Setup</span></a>
          <ul>
              <li class="{{ (\Request::route()->getName() == 'setup') ? 'active' : '' }}">
                  <a href="{{ route('setup') }}" title="Setup appearance"><i class="fa fa-lg fa-fw fa-eye"></i> <span class="menu-item-parent">Appearance</span></a>
              </li>
              <li class="">
                  <a href="{{ route('setup') }}" title="Setup notification"><i class="fa fa-lg fa-fw fa-bell-o"></i> <span class="menu-item-parent">Notification</span></a>
              </li>
              <li class="{{ (\Request::route()->getName() == 'operators') ? 'active' : '' }}">
                  <a href="{{ route('operators') }}" title="Setup operator"><i class="fa fa-lg fa-fw fa-user"></i> <span class="menu-item-parent">Operator</span></a>
              </li>
          </ul>
      </li>
      {{-- Report --}}
      <li>
          <a href="nvc/reports" title="Report Management"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Report</span></a>
      </li>
    </ul>
  </nav>
  {{-- Minify Menu --}}
  <span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i>
  </span>

</aside>
