@extends("layouts.master")
@section('title', 'Notas Interactivas')
@section('description','Qrnotes es una nueva forma de tomar apuntes, con la ayuda de códigos QR usados como stickers, tus apuntes serán realmente interactivos')
@section("content")
<?php
$vinculos = ["auth/register" => "Regístrate acá", "auth/login" => "O inicia sesión aquí"];
?>
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <div id="caja-opaca">
                <h1 class="header center" id="header-principal">Una nueva forma de tomar apuntes</h1>
                <div class="row center">
                    <h6 class="header col s12 light">Haz que tus cuadernos sean realmente interactivos con algo tan sencillo como pegar un sticker, es como subir archivos a tu cuaderno</h6>
                </div>
                <div class="row center">
                    <a href="http://qrnotes.co/auth/register" id="download-button" class="btn-large waves-effect waves-light deep-orange lighten-2">Solicítalo aquí</a>
                </div>
            </div>

            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="img/lapiz.jpg" alt="Unsplashed background img 1"></div>
</div>
<!--Cuadro de características-->
<div class="col s12 center">
    <h4>Cómo funciona</h4>
    <h3 id="sub-caracteristicas">Conoce un poco más de QRnotes</h3>
    <div class="container1">
        <div class="section">
            <div class="row">
                <div class="caracteristicas col s10 l3 offset-m0 offset-s-1 separado">
                    <div class="icono-caracteristica green lighten-2 ">
                        <i class="white-text fa fa-camera-retro medium"></i>
                    </div>
                    <h5 class="left-align">1. Toma la foto</h5>
                    <p class="left-align">
                        Cuando estés en clase y veas que el profe dibujó un gráfico importante en el tablero, pero no quieres copiarlo, tómale una foto
                    </p>
                </div>
                <div class="caracteristicas col s10  l3 offset-m0 offset-l1 offset-s-1 separado">
                    <div class="icono-caracteristica blue lighten-2">
                        <i class="fa fa-sticky-note white-text medium"></i>
                    </div>
                    <h5 class="left-align">2. Pega tu QRnote</h5>
                    <p class="left-align">
                        Retira el sticker de tu hoja de QRnotes y pégalo en la parte del cuaderno en la que estás tomando notas
                    </p>
                </div>
                <div class="caracteristicas col s10 l3 offset-m0 offset-l1 offset-s-1">
                    <div class="icono-caracteristica red lighten-2">
                        <i class="fa fa-qrcode white-text medium"></i>
                    </div>
                    <h5 class="left-align">3. Escanea tu código </h5>
                    <p class="left-align">
                        Escanea tu QRnote con tu lector en el celular y sube la foto que acabas de tomar en la página a la que el código te lleva
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="caracteristicas col s10 l3 offset-m0 offset-s-1 separado">
                    <div class="icono-caracteristica teal lighten-2">
                        <i class="fa fa-book white-text medium"></i>
                    </div>
                    <h5 class="left-align">4. Estudia tus apuntes</h5>
                    <p class="left-align">
                        En el momento de repaso, escanea tu QRnote, este te dirigirá al archivo que subiste. Así tendrás siempre acceso a los archivos relacionados con tus apuntes
                    </p>
                </div>
                <div class="caracteristicas col s10 l3 offset-m0 offset-l1 offset-s-1 separado">
                    <div class="icono-caracteristica red lighten-2">
                        <i class="material-icons white-text medium">video_library</i>
                    </div>
                    <h5 class="left-align">Cualquier tipo de archivo</h5>
                    <p class="left-align">
                        Puedes guardar cualquier tipo de archivo, incluso direcciones web, así tu experiencia de repaso será más cómoda, puedes guardar desde audios hasta vídeos, utilízalos creativamente
                    </p>
                </div>
                <div class="caracteristicas col s10  l3  offset-l1 offset-m0 offset-s-1 separado">
                    <div class="icono-caracteristica brown lighten-2">
                        <i class="material-icons white-text medium">label_outline</i>
                    </div>
                    <h5 class="left-align">Mantén el orden</h5>
                    <p class="left-align">
                        ¿Cansado de tus gráficos chuecos?, utiliza qrnotes y tus cuadernos lucirán mucho mejor, olvídate de manchones de tinta al dibujar o de cuando no trajiste regla
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Fin de cuadro de características-->


<!--detalles-->
<div class="nocontainer">
    <div class="section caja-blanca">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">info_outline</i></h2>
                    <h5 class="center">Información detallada sin escribir de más</h5>

                    <p class="light">No tienes que distraerte copiando tablas o haciendo diagramas, sólo toma una foto y apunta lo que realmente importa, tus apuntes personales valen más que lo que todos copian.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">Por estudiantes y para estudiantes</h5>

                    <p class="light">QRnotes ha sido diseñado por estudiantes que conocen la dinámica de las clases y a partir de ello salen las funcionalidades que te ofrecemos. Sin embargo estamos abiertos a sugerencias, si deseas contáctanos a <a  class="deep-orange-text " href="mailto:contacto@qrnotes.co">nuestro email</a> o a través de redes sociales como <a class="deep-orange-text " href="http://twitter.com/qrnotes">@qrnotes</a></p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center brown-text"><img id="un" src="img/un.png"></h2>
                    <h5 class="center">Diseñado en la UN</h5>

                    <p class="light">Iniciamos nuestro proceso creativo en la Universidad Nacional, así que no solo está diseñado por estudiantes y para estudiantes, sino que tenemos en cuenta la experiencia académica en la UNAL para brindar una funcionalidad cada vez mayor a nuestra apicación.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!--fin de primer cuadro de detalles-->






@stop
