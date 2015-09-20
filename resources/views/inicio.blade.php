@extends("layouts.master")
@section('title', 'Notas Interactivas')
@section("content")
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <div id="caja-opaca">
                <h1 class="header center" id="header-principal">Una nueva forma de tomar apuntes</h1>
                <div class="row center">
                    <h6 class="header col s12 light">Haz que tus cuadernos sean interactivos con algo tan sencillo como pegar un sticker</h6>
                </div>
                <div class="row center">
                    <a href="http://qrnotes.co/registro" id="download-button" class="btn-large waves-effect waves-light deep-orange lighten-2">Solicítalo aquí</a>
                </div>
            </div>

            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="img/lapiz.jpg" alt="Unsplashed background img 1"></div>
</div>


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
                    <h5 class="center">Diseñado para la UN</h5>

                    <p class="light">Iniciamos nuestro proceso creativo en la Universidad Nacional, así que no solo está diseñado por estudiantes y para estudiantes, sino que tenemos en cuenta la experiencia académica en la UNAL para brindar una funcionalidad cada vez mayor a nuestra apicación.</p>
                </div>
            </div>
        </div>

    </div>
</div>
<!--fin de primer cuadro de detalles-->

<!--Cuadro de características-->
<div class="col s12 center">
    <h4>Características</h4>
    <h3 id="sub-caracteristicas">Conoce un poco más de QRnotes</h3>
    <div class="container1">
        <div class="section">
            <div class="row">
                <div class="caracteristicas col s10 l3 offset-m0 offset-s-1 separado">
                    <div class="icono-caracteristica green lighten-2 ">
                        <i class="material-icons white-text medium">visibility</i>
                    </div>
                    <h5 class="left-align">Visualmente atractivo</h5>
                    <p class="left-align">
                        Tus cuadernos lucirán mejor tras utilizar qrnotes, nuestros diseños atractivos y la posibilidad de personalización harán que realmente resalten
                    </p>
                </div>
                <div class="caracteristicas col s10  l3 offset-m0 offset-l1 offset-s-1 separado">
                    <div class="icono-caracteristica blue lighten-2">
                        <i class="material-icons white-text medium">done</i>
                    </div>
                    <h5 class="left-align">Práctico</h5>
                    <p class="left-align">
                        Tan fácil como pegar un sticker, luego solo tienes que escanearlo para subir tus archivos o para leer los mismos. Nunca tomar nota de gráficos o funciones fue tan fácil
                    </p>
                </div>
                <div class="caracteristicas col s10 l3 offset-m0 offset-l1 offset-s-1">
                    <div class="icono-caracteristica red lighten-2">
                        <i class="material-icons white-text medium">video_library</i>
                    </div>
                    <h5 class="left-align">Multimedia</h5>
                    <p class="left-align">
                        Puedes guardar cualquier tipo de archivo, incluso direcciones web, así tu experiencia de repaso será más cómoda, puedes guardar desde audios hasta vídeos, utilízalos creativamente
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="caracteristicas col s10 l3 offset-m0 offset-s-1 separado">
                    <div class="icono-caracteristica teal lighten-2">
                        <i class="material-icons white-text medium">my_location</i>
                    </div>
                    <h5 class="left-align">Desde cualquier lugar</h5>
                    <p class="left-align">
                        Las notas que guardes en Qrnotes están disponibles online, sólo ingresa a tu cuenta y tendrás acceso a todos tus qrnotes
                    </p>
                </div>
                <div class="caracteristicas col s10  l3 offset-m0 offset-l1 offset-s-1 separado">
                    <div class="icono-caracteristica amber darken-2">
                        <i class="material-icons white-text medium">thumb_up</i>
                    </div>
                    <h5 class="left-align">Divertido</h5>
                    <p class="left-align">
                        No se te haga raro cuando te pregunten qué son esas etiquetas raras, comparte tu experiencia y así enriqueceremos el ecosistema qrnote
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




<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center mensaje">
                <h5 class="header col s12 light black-text">Diseñado para tí especialmente</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="img/Estudiantes13.jpg" alt="Unsplashed background img 2"></div>
</div>

<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12 center">
                <h4>¿Qué es exactamente qrnotes?</h4>
                <p class="left-align ">Qrnotes es un sistema de ayuda para la toma de apuntes, basado en códigos QR, códigos de barras que te permitirán tomar notas de forma interactiva, sólo pega los qrnotes a tu cuaderno, escanea el código y sube la foto, vídeo o el archivo que quieras para consultarlo después.</p>
                <p class="left-align ">Así tus cuadernos estarán más organizados, podrás prestar más atención a clase y tus repasos serán mucho más entretenidos.</p>
            </div>
        </div>

    </div>
</div>
@stop
