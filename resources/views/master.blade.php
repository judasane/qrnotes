<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

        <title>Qrnotes - @yield('title')</title>

        <!-- CSS  -->

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="{{ asset('/css/materialize.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
        <link href="{{ asset('/css/style.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
        <link href="{{ asset('/css/inicio.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    </head>
    <body >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="{{ url('/') }}" class="brand-logo"><img src="/img/logo.png"/></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="#">Sé un pionero</a></li>
                    @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="#">Sé un pionero</a></li>
                    @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                    <li><a href="#">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            </div>
        </nav>
        @section('content')

        @show

        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Importante</h5>
                        <p class="grey-text text-lighten-4">QRnotes es una aplicación para la ayuda académica que está actualmente en <strong class="deep-orange-text text-lighten-2">desarrollo</strong>, así que estamos abiertos a sugerencias, sin embargo resaltamos la palabra desarrollo porque aún falta mucho por mejorar. Si tienes sugerencias o simplemente quieres contactarnos, puedes hacerlo a través de nuestras formas de contacto </p>


                    </div>
                    <div class="col l3 s12 left-align">
                        <h5 class="white-text">Contacto</h5>
                        <ul>
                            <li><a  href="http://twitter.com/qrnotesco"><i class="fa fa-twitter-square"></i> @qrnotesco</a></li>
                            <li><a  href="http://facebook.com/qrnotes"><i class="fa fa-facebook-square"></i> Fanpage</a></li>
                            <li><a  href="mailto:contacto@qrnotes.co"><i class="fa fa-envelope"></i> contacto@qrnotes.co</a></li>
                        </ul>
                    </div>
                    <div class="col l3 s12 left-align">
                        <h5 class="white-text">Navegación</h5>
                        <ul >
                            <li><a  href="#!">Pioneros</a></li>
                            <li><a href="#!">Dónde comprar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    Qrnotes es un producto <a class="brown-text text-lighten-3" href="http://facebook.com/sinexiones">Sinexiones</a>
                </div>
            </div>
        </footer>


        <!--  Scripts-->
        <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-67225909-1', 'auto');
            ga('send', 'pageview');
        </script>

    </body>
</html>
