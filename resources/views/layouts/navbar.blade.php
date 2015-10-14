<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo"><img src="{{ asset("/img/logo gris.png") }}" height="40rem"/></a>
        <ul class="right hide-on-med-and-down">
            @if(isset($vinculos) && count($vinculos)>0)
                @if(Auth::check())
                <?php $vinculos["logout"]="Logout"; ?>
                @endif
            @foreach($vinculos as $key=>$value)
            <li><a href="{{ asset("$key") }}" >{{$value}}</a></li>
            @endforeach
            @endif

        </ul>

        <ul id="nav-mobile" class="side-nav">
            @if(isset($vinculos) && count($vinculos)>0)
            @foreach($vinculos as $key=>$value)
            <li><a href="{{ asset("$key") }}" >{{$value}}</a></li>
            @endforeach
            @endif
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-bars" style="font-size: 2rem" ></i></a>
    </div>
</nav>
