<div class="collection">
    @foreach ($packs as $pack)
    @if($pack->estado=="usado")
    <a href="{{ asset("a/c$pack->id") }}" class="collection-item">{{$pack->alias}} <span class="badge alerta usado">Agotado</span></a>
    @else
    <a href="{{ asset("a/c$pack->id") }}" class="collection-item">{{$pack->alias}} <span class="badge alerta">{{$pack->estado}}</span></a>
    @endif
    @endforeach
</div>
