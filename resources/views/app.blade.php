<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}" />
    <!--<link href="styles.css?13" rel='stylesheet' type='text/css'> -->
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class="navbar-brand">Laravel</a>
            </div>
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{action('Tasks_controller@index')}}">
                    Task List
                </a>
                <a class="navbar-brand" href="{{action('Articles_controller@index')}}">
                    Articles
                </a>
                <a class="navbar-brand" href="{{action('Finance_controller@index') }}">
                    Finance
                </a>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Зарегистрироваться</a></li>
                    <li><a href="#">Войти</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    @yield('content')
    </div>
    <div class="navbar-fixed-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container">
                Created By Igor Dergunov
            </div>
        </div>
    </div>
    @yield('footer')
<script src="{{asset('/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="scripts.js?37"></script>

</body>
</html>
