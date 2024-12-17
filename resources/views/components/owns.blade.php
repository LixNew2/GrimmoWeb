<div id="content">
    @php
        $goods = session('goods', $goods ?? []);
    @endphp

    @forelse($goods as $good)
        <div id="content-own">
            @if(!empty($good->image))
                @if(request()->is('my_owns'))
                    <a href="/my_own/{{$good->id_bien}}"><img id='img_own' src="data:image/png;base64,{{ $good->image }}"></a>
                @else
                    <a href="/own/{{$good->id_bien}}"><img id='img_own' src="data:image/png;base64,{{ $good->image }}"></a>
                @endif
            @else
                @if(request()->is('my_owns'))
                    <a href="/my_own/{{$good->id_bien}}"> <p>Aucune image disponible</p></a>
                @else
                    <a href="/own/{{$good->id_bien}}"> <p>Aucune image disponible</p></a>
                @endif
            @endif
            <strong><p>{{$good->titre}}</p></strong>
            <p id="price_text">€{{$good->prix}}</p>
        </div>
    @empty
    @endforelse
</div>


