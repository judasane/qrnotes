<!DOCTYPE html>
<html lang="es">
    <head>        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <title>Qrnotes - @yield('title')</title>
        <link rel="icon" type="image/png" href="img/logoQ.png">
        <!-- CSS  -->
        @include('layouts.styles')
    </head>
    <body >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('layouts.navbar')
        @yield("content")
        <!--footer-->
        @include('layouts.footer')
        <!--  Scripts-->
        @include('layouts.scripts')
    </body>
</html>
