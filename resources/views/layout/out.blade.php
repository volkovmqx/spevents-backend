<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SmartProjects Login</title>
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
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="#">
			  		SmartProjects Events
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
            
				<div class="module module-login span4 offset4">
					@yield('content')
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

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
