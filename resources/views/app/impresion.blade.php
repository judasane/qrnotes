<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/imprimir_carton.css') }}"  />
        <title></title>
    </head>
    <body>
        <div>
            <div class="info">
                <h5 id="packno">Pack # {{$actual}}</h5>
                <img src="http://www.qrnotes.co/archivos/generados/{{"c".$actual.".png"}}" height="80px" width="80px"/>
                <a href="listo"><img src=" {{ asset('/img/logo gris.png') }} " id="logo"/></a>

            </div>
            <div class="info" id="segundo" >
                
                Código de seguridad: <br><span id="codigo">{{$codigo}}</span>
            </div>

        </div>
        <div id="contenedor">
            @for ($i = 1; $i <= 20; $i++)
            <div class="recorte">
                <div class="subrecorte">

                    <img src="http://www.qrnotes.co/archivos/generados/{{"c".$actual."-".$i.".png"}}" height="100%" width="100%">
                </div>
                <div class="texto">
                </div>
            </div>
            @endfor

        </div>

    </body>
</html>
