<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SmartProjects @yield('title')</title>
        <link type="text/css" href="{{asset('bootstrap/css/datetimepicker.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
        
        <link type="text/css" href="{{asset('css/theme.css')}}" rel="stylesheet">
        <link type="text/css" href="{{asset('images/icons/css/font-awesome.css')}}" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="{{ url('dashboard') }}">SmartProjects Events </a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                       
                      
                        <ul class="nav pull-right">
                            <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('images/user.png')}}" class="nav-avatar" />
                                <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="{{ url('dashboard') }}"><i class="menu-icon icon-home"></i>Dashboard
                                </a></li>

                                    @if (Request::is('events*'))
                                        <li><a href="#togglePages" data-toggle="collapse">
                                    @else
                                        <li><a class="collapsed" href="#togglePages" data-toggle="collapse">
                                    @endif

                                    <i class="menu-icon icon-bullhorn">
                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                            </i>Events <b class="label green pull-right">
                                    {{ $numberofevents }}</b></a>
                                    @if (Request::is('events*'))
                                        <ul class="unstyled in collapse" id="togglePages">
                                    @else
                                         <ul class="collapse unstyled" id="togglePages">
                                    @endif
                               
                                    <li><a href="{{ url('events/create') }}"><i class="icon-plus"></i>Add Event </a></li>
                                    <li><a href="{{ url('events') }}"><i class="icon-bookmark"></i>All Events </a></li>
                                </ul>
                            </li>


                                <li><a href="#"><i class="menu-icon icon-user"></i>Users <b class="label orange pull-right">
                                    Under Dev</b> </a></li>
                                <li><a href="{{ route('logout') }}"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                           @yield('content')
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2015 SmartProjects </b>All rights reserved.
            </div>
        </div>
        <script src="{{asset('scripts/jquery-1.9.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('scripts/jquery-ui-1.10.1.custom.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('scripts/datatables/jquery.dataTables.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap/js/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format:'YYYY-MM-DD HH:mm',
                    stepping:10,
                    showClear:true,
                    showClose:true,
                    widgetPositioning:{
                        horizontal: 'left',
                        vertical: 'bottom'
                    }
                });
            });
        </script>
    </body>
</html>
