<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('/css/materialize.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
<link href="{{ asset('/css/style.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
<link href="{{ asset('/css/inicio.css') }}" type='text/css' rel="stylesheet" media="screen,projection">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
@if(isset($hojas) && count($hojas)>0)
@foreach($hojas as $hoja)
<link href="{{ asset("/css/$hoja.css") }}" type='text/css' rel="stylesheet" media="screen,projection">
@endforeach
@endif
