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
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                
            }

            
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title"><img src="{{ asset('images/user.png') }}" alt="" /></div>
                <br> <br>
                <a class="btn btn-large btn-danger" href="{{ url('auth/login') }}">Login</a>
            </div>
        </div>
    </body>
</html>
