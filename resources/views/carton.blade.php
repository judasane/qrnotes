<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/imprimir_carton.css') }}"  />
        <title></title>
    </head>
    <body>
        <div>
            <img src=" {{ asset('/img/logo gris.png') }} " id="logo"/>
            <h5>cartón N° c2</h5>
        </div>

        @for ($i = 0; $i < 20; $i++)
        <div class="recorte">
            <div class="subrecorte">
                <img src="img/qrnotes.png" height="100%" width="100%">
            </div>
<!--            <div class="texto">
                
            </div>-->
        </div>
        @endfor



    </body>
</html>
