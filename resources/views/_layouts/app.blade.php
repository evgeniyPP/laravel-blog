<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta http-equiv="Cache-Control" content="no-cache, no-store">
        <link rel="shortcut icon" href={{ asset('storage/images/favicon.png') }}>
        <title>Laravel Блог – @yield('title')</title>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,400italic|Roboto:400,700,500|Open+Sans:400,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
        @yield('stylesheets')

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        @yield('header')
        @yield('search')
        @yield('content')
        @yield('copyrights')
        @yield('scripts')
    </body>
</html>