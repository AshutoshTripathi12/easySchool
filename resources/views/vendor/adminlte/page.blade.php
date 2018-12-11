@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
    <style type="text/css">
      .slimScrollBar {
        background: none repeat scroll 0 0 #6b58cd !important;
        border-radius: 0;
        display: none;
        height: 702.936px;
        position: absolute;
        right: 1px;
        top: 145px;
        width: 5px!important;
        z-index: 99;
        opacity:0.5!important;
      }
    </style>
@stop

@section('body_class', 'skin-' . config('adminlte.skin', 'blue') . ' sidebar-mini ' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . (config('adminlte.collapse_sidebar') ? ' sidebar-collapse ' : ''))

@section('body')
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">
            @if(config('adminlte.layout') == 'top-nav')
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url(config('adminlte.dashboard_url', 'dashboard')) }}" class="navbar-brand">
                            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                        </a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
            @else
            <!-- Logo -->
            <a href="{{ url(config('adminlte.dashboard_url', 'dashboard')) }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">{!! config('adminlte.logo_mini', '<b>A</b>LT') !!}</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">{{ trans('adminlte::adminlte.toggle_navigation') }}</span>
                </a>
            @endif
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="tasks-menu">
                            <a href="../../../" title="View Home Page">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </li>
                        {{-- Bill Payment Notification --}}
                        @if(Auth::check() && Auth::User()->school->due == 0)
                        <li class="dropdown tasks-menu">
                            @role('headmaster')
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <span class="label label-success">1</span>
                            </a>
                            <ul class="dropdown-menu">
                              <li class="header">বাৎসরিক বিল সংক্রান্ত বার্তা!</li>
                              <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                  <li>
                                    <a href="#">
                                      <div class="pull-left">
                                        
                                      </div>
                                      <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                            @endrole
                        </li>
                        @endif
                        {{-- Bill Payment Notification --}}
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <span class="label label-success">7</span>
                            </a>
                            <ul class="dropdown-menu">
                              <li class="header">You have 4 messages</li>
                              <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                  <li><!-- start message -->
                                    <a href="#">
                                      <div class="pull-left">
                                        <img src="{{ asset('images/img.jpg')}}" class="img-circle messenger-favicon" alt="User Image">
                                      </div>
                                      <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                    </a>
                                  </li>
                                  <!-- end message -->
                                  <li>
                                    <a href="#">
                                      <div class="pull-left">
                                        <img src="{{ asset('images/img.jpg')}}" class="img-circle messenger-favicon" alt="User Image">
                                      </div>
                                      <h4>
                                        AdminLTE Design Team
                                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                      </h4>
                                      <p>Why not buy a new awesome theme?</p>
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-th" aria-hidden="true"></i>
                                <span class="label label-warning">12</span>
                            </a>
                                <ul class="dropdown-menu">
                                  <li class="header">You have 12 Modules</li>
                                  <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                          page and may cause design problems
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                      </li>
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="footer"><a href="{{ route('dashboard') }}">View all</a></li>
                                </ul>
                        </li>
                        <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <img src="{{ asset('images/img.jpg')}}" class="user-image" alt="User Image">
                            {{ Auth::User()->name }}</a>
                            <ul class="dropdown-menu">
                              <!-- User image -->
                              <li class="user-header">
                                <img src="{{ asset('images/img.jpg')}}" class="img-circle" alt="User Image">
                                <p>
                                  {{ Auth::User()->name }}
                                  <small>Member since Nov. 2012</small>
                                </p>
                              </li>
                              <!-- Menu Body -->
                              <li class="user-body">
                                <div class="row">
                                  <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                  </div>
                                  <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                  </div>
                                  <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                  </div>
                                </div>
                                <!-- /.row -->
                              </li>
                              <!-- Menu Footer-->
                              <li class="user-footer">
                                <div class="pull-left">
                                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                  @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                      <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" class="btn btn-default btn-flat">
                                          <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                      </a>
                                  @else
                                      <a href="#"
                                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                          <i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
                                      </a>
                                      <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;" class="btn btn-default btn-flat">
                                          @if(config('adminlte.logout_method'))
                                              {{ method_field(config('adminlte.logout_method')) }}
                                          @endif
                                          {{ csrf_field() }}
                                      </form>
                                  @endif
                                </div>
                              </li>
                            </ul>                            
                        </li>
                    </ul>
                </div>
                @if(config('adminlte.layout') == 'top-nav')
                </div>
                @endif
            </nav>
        </header>
        
        {{-- NAV MENU CODES ARE HERE --}}
        @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    {{-- @each('adminlte::partials.menu-item', $adminlte->menu(), 'item') --}}
                    @permission('developer-control')
                    <li class="header">Developer Control</li>
                    <li class="{{ Request::is('schools') ? 'active menu-open' : '' }} {{ Request::is('schools/*') ? 'active menu-open' : '' }} {{ Request::is('users') ? 'active menu-open' : '' }} {{ Request::is('users/*') ? 'active menu-open' : '' }} {{ Request::is('roles') ? 'active menu-open' : '' }} {{ Request::is('roles/*') ? 'active menu-open' : '' }} {{ Request::is('subjects') ? 'active menu-open' : '' }} {{ Request::is('subjects/*') ? 'active menu-open' : '' }} treeview">
                        <a href="#">
                            <i class="fa fa-fw fa-code"></i>
                            <span>Developer Control</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          @permission('school-management-crud')
                          <li class="{{ Request::is('schools') ? 'active' : '' }}">
                              <a href="/schools">
                                  <i class="fa fa-fw fa-university"></i>
                                  <span>School Management</span>
                              </a>
                          </li>
                          @endpermission
                          @permission('user-crud')
                          <li class="{{ Request::is('users') ? 'active' : '' }}">
                              <a href="/users">
                                  <i class="fa fa-fw fa-user"></i>
                                  <span>User Management</span>
                              </a>
                          </li>
                          @endpermission
                          @permission('role-crud')
                          <li class="{{ Request::is('roles') ? 'active' : '' }}">
                              <a href="/roles">
                                  <i class="fa fa-fw fa-list"></i>
                                  <span>Roles</span>
                              </a>
                          </li>
                          @endpermission
                          @permission('universal-subjects')
                          <li class="{{ Request::is('subjects') ? 'active' : '' }}">
                              <a href="/subjects">
                                  <i class="fa fa-fw fa-book"></i>
                                  <span>Subject</span>
                              </a>
                          </li>
                          @endpermission
                          @permission('role-crud') {{-- for the time being role-crud is used --}}
                          <li class="{{ Request::is('sms') ? 'active' : '' }}">
                              <a href="/#">
                                  <i class="fa fa-envelope-o"></i>
                                  <span>SMS</span>
                              </a>
                          </li>
                          @endpermission
                        </ul>
                    </li>
                    @endpermission
                  
                  @role('headmaster')
                    @permission('school-settings')
                    <li class="header">প্লাটফর্ম সেটিংস</li>
                    <li class="{{ Request::is('settings') ? 'active' : '' }}">
                      <a href="{{ route('settings.edit') }}">
                          <i class="fa fa-fw fa-cogs"></i>
                          <span>স্কুল সেটিংস</span>
                      </a>
                    </li>
                    {{-- <li class="{{ Request::is('exams/settings') ? 'active' : '' }}">
                      <a href="{{ route('exams.index') }}">
                        <i class="fa fa-fw fa-cog"></i>
                        <span>পরীক্ষার সেটিংস</span>
                      </a>
                    </li> --}}
                    @endpermission

                    <li class="header">প্রশাসনিক</li>
                    <li class="{{ Request::is('teachers') ? 'active' : '' }}">
                        <a href="{{ route('teachers.index') }}">
                            <i class="fa fa-fw fa-address-book"></i>
                            <span>শিক্ষক ব্যবস্থাপনা</span>
                        </a>
                    </li>

                    <li class="header">শিক্ষার্থী সংক্রান্ত</li>
                    
                    <li class="{{ Request::is('admission/classwise/*') ? 'active menu-open' : '' }} treeview">
                        <a href="#">
                            <i class="fa fa-fw fa-check-square-o"></i>
                            <span>শিক্ষার্থী ভর্তি প্রক্রিয়া</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          @php
                            $classes = explode(',', Auth::user()->school->classes);
                            if (($key = array_search(10, $classes)) !== false) {
                                unset($classes[$key]);
                            }
                          @endphp
                          @foreach($classes as $class)
                          <li class="{{ Request::is('admission/classwise/'.$class) ? 'active' : '' }}"><a href="{{ route('admissions.getclasswise', $class) }}"><i class="fa fa-file-text"></i>{{ bangla_class($class) }} শ্রেণি</a></li>
                          @endforeach
                        </ul>
                    </li>

                    <li class="{{ Request::is('students/*') ? 'active' : '' }}">
                        <a href="{{ route('students.index') }}">
                            <i class="fa fa-fw fa-users"></i>
                            <span>শিক্ষার্থী ব্যবস্থাপনা</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('search/student/*') ? 'active' : '' }}">
                        <a href="{{ route('students.getsearch') }}">
                            <i class="fa fa-fw fa-search"></i>
                            <span>শিক্ষার্থী খুঁজুন</span>
                        </a>
                    </li>
                  @endrole
                    <li class="header">পরীক্ষা সংক্রান্ত</li>
                    <li class="{{ Request::is('exams') ? 'active menu-open' : '' }} {{ Request::is('exams/*') ? 'active menu-open' : '' }} {{ Request::is('exam/*') ? 'active menu-open' : '' }} treeview">
                        <a href="#">
                            <i class="fa fa-fw fa-pencil-square-o"></i>
                            <span>স্কুল পরীক্ষা ব্যবস্থাপনা</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          @role('headmaster')
                          <li class="{{ Request::is('exams') ? 'active' : '' }}"><a href="{{ route('exams.index') }}"><i class="fa fa-list-ol"></i> পরীক্ষার তালিকা</a></li>
                          <li class="{{ Request::is('exam/subject/allocation') ? 'active' : '' }}"><a href="{{ route('exam.getsubjectallocation') }}"><i class="fa fa-cog"></i> শিক্ষকদের বিষয় বণ্টন</a></li>
                          @endrole
                          <li class="{{ Request::is('exam/subject/allocation') ? 'active' : '' }}"><a href="{{ route('exam.getsubjectallocation') }}"><i class="fa fa-cog"></i> নম্বর প্রদান</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
        @endif

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @if(config('adminlte.layout') == 'top-nav')
            <div class="container">
            @endif

            <!-- Content Header (Page header) -->
            <section class="content-header">
                @yield('content_header')
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')

            </section>
            <!-- /.content -->
            @if(config('adminlte.layout') == 'top-nav')
            </div>
            <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
