<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/imprimir_carton.css') }}"  />
        <title></title>
    </head>
    <body>
        <div>

            <a href="listo"><img src=" {{ asset('/img/logo gris.png') }} " id="logo"/></a>
            <img src="http://www.qrnotes.co/archivos/local/{{"c".$actual.".png"}}" height="80px" width="80px"/>
            <h5>cartón N° {{$actual}}</h5>
            Código de seguridad: {{$codigo}}
            
        </div>

        @for ($i = 1; $i <= 20; $i++)
        <div class="recorte">
            <div class="subrecorte">
                
                <img src="http://www.qrnotes.co/archivos/local/{{"c".$actual."-".$i.".png"}}" height="100%" width="100%">
            </div>
            <div class="texto">
            </div>
        </div>
        @endfor



    </body>
</html>
