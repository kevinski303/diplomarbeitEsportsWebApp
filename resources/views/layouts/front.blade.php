<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customstyle.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <!--<a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>-->
                <a href="{{ url('/') }}">
                    <img src="/images/Logo7.png" class="header-spg-logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/games" style="color: lightgrey"><button class="buttonFront">Spiele</button></a>
                    </li>
                    <li>
                        <a href="/table" style="color: lightgrey"><button class="buttonFront">Tabelle</button></a>
                    </li>
                    <li>
                        <a href="/teams" style="color: lightgrey"><button class="buttonFront">Teams</button></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    @yield('content')
    <p style="visibility:hidden;">&nbsp</p>
    <p style="visibility:hidden;">&nbsp</p>
    <p style="visibility:hidden;">&nbsp</p>
</div>
<div>
<footer class="page-footer navbar-default navbar-fixed-bottom" style="">
    <div class="container">
    <div class="row">
    <div class="col-md-6 text-uppercase">
        <p style="margin-top: 1%;"><a href="/impressum" class="text" style="color: darkgray;">Impressum & Kontakt </a></p>
    </div>
    </div>
    </div>
</footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
