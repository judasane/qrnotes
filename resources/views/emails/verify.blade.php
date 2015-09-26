<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hola {{$nombre}}</h2>

        <div>
            Gracias por crear una cuenta con nosotros.
            Estamos seguros de que te encantará usar QRnotes.
            Por favor sigue el siguiente vínculo para verificar tu dirección de correo:
            {{ URL::to('auth/verificar' . "?code=$confirmation_code") }}<br/>
        </div>

    </body>
</html>
