<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    	{{-- META --}}
    	@yield('meta')

        <!-- FAVICONS -->
        <link rel="shortcut icon" href="{{asset('web/images/favicon.ico')}}" type="image/x-icon">
        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/settings.css')}}">
        <!-- REVOLUTION LAYERS STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/layers.css')}}">
        <!-- REVOLUTION NAVIGATION STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/revolution/css/navigation.css')}}">
        <!-- BOOTSTRAP STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/bootstrap.css')}}">
        <!-- TEMPLATE STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/style.css')}}">
        <!-- RESPONSIVE STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/responsive.css')}}">
        <!-- CUSTOM STYLES -->
        <link rel="stylesheet" type="text/css" href="{{asset('web/css/custom.css')}}">

    	{{-- EXTRA STYLESHEET --}}
    	@yield('stylesheet')
    </head>
    <body>
        {{-- HEADER --}}
    	@include('web.include.header')

        {{-- CONTENT --}}
    	@yield('content')

        {{-- FOOTER --}}
    	@include('web.include.footer')

    	@yield('script')
    </body>
</html>
       

        

  