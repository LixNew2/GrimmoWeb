@extends('layout.app')

@section('content')
    <div id="content-own-spec">
        @if(!empty($good->image))
            <img id='img_own_spec' src="data:image/png;base64,{{ $good->image }}">
        @else
            <p>Aucune image disponible</p>
        @endif
        <div id="title_famous">
            <h1 id="title_own">{{$good->titre}}</h1>
            @if($isFavorite)
                <form METHOD="POST" action="{{route('remove_favorite')}}">
                    @csrf
                    <input type="hidden" name="value" value="{{$good->id_bien}}" style="display:none">
                    <button type="submit" class="famous_btn" id="remove_favorite_btn"><svg class="heart" fill="#ce0000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M14 20.408c-.492.308-.903.546-1.192.709-.153.086-.308.17-.463.252h-.002a.75.75 0 01-.686 0 16.709 16.709 0 01-.465-.252 31.147 31.147 0 01-4.803-3.34C3.8 15.572 1 12.331 1 8.513 1 5.052 3.829 2.5 6.736 2.5 9.03 2.5 10.881 3.726 12 5.605 13.12 3.726 14.97 2.5 17.264 2.5 20.17 2.5 23 5.052 23 8.514c0 3.818-2.801 7.06-5.389 9.262A31.146 31.146 0 0114 20.408z"/></svg>
                        @else
                            <form METHOD="POST" action="{{route('add_favorite')}}">
                                @csrf
                                <input type="hidden" name="value" value="{{$good->id_bien}}" style="display:none">
                                <button type="submit" class="famous_btn" id="add_favorite_btn"><svg class="heart" fill="#ce0000"
                                                                                                    id="svg2" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" sodipodi:docname="heart-empty.svg" inkscape:version="0.48.4 r9939"
                                                                                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  width="800px" height="800px"
                                                                                                    viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">
<sodipodi:namedview  inkscape:cy="278.42087" inkscape:cx="644.39976" inkscape:zoom="0.37249375" showgrid="false" id="namedview30" guidetolerance="10" gridtolerance="10" objecttolerance="10" borderopacity="1" bordercolor="#ce0000" pagecolor="#ffffff" inkscape:current-layer="svg2" inkscape:window-maximized="1" inkscape:window-y="24" inkscape:window-height="876" inkscape:window-width="1535" inkscape:pageshadow="2" inkscape:pageopacity="0" inkscape:window-x="65">
</sodipodi:namedview>
                                        <path id="path11796" inkscape:connector-curvature="0" d="M832.486,46.17c-48.316,0.497-97.873,9.932-146.357,29.285l-2.201,0.934
l-2.201,1.134c-30.735,15.652-58.748,35.232-83.651,58.436c-134.023-115.917-347.394-124.33-493.37,7.271l-1.468,1.334l-1.334,1.401
C-26.152,279.721-23.153,485.712,53.607,648.474l0.667,1.268l0.667,1.334c90.404,167.407,259.216,309.652,413.054,426.596l0.4,0.333
l0.333,0.268c9.897,7.256,26.915,22.257,46.562,37.022c19.646,14.766,41.839,30.948,74.312,37.156l7.271,1.4l7.338-0.601
c34.082-2.939,47.452-15.523,69.843-29.617c22.391-14.095,47.177-31.986,72.645-51.565
c50.202-38.595,102.147-83.079,136.351-114.804c0.44-0.409,1.166-0.997,1.601-1.401c0.071-0.06,0.13-0.14,0.2-0.2
c72.052-61.482,143.423-132.361,203.926-215.732c0.019-0.025,0.048-0.041,0.065-0.066c0.114-0.153,0.22-0.313,0.334-0.467
c95.955-129.193,142.502-303.295,86.987-474.825l-1.001-3.069l-1.334-2.869C1111.497,123.881,977.435,44.681,832.486,46.17z
 M834.221,151.702c104.434-2.402,195.973,53.518,241.415,149.158c41.99,133.897,5.693,270.32-72.512,375.364l-0.2,0.267
l-0.199,0.268c-54.48,75.18-120.459,140.988-188.85,199.189l-0.867,0.801l-0.867,0.8c-30.797,28.667-82.925,73.323-130.547,109.935
c-23.812,18.306-46.64,34.665-64.373,45.828c-6.668,4.197-13.008,7.059-18.212,9.272c-5.469-2.988-12.41-7.196-19.611-12.607
c-14.5-10.897-29.94-24.809-46.763-37.224c-0.262-0.199-0.538-0.4-0.8-0.601c-149.294-113.553-306.55-251.435-382.169-390.44
C88.275,470.559,90.954,313.58,177.683,221.344c117.926-104.852,293.123-82.057,380.5,25.549l42.56,52.366l41.159-53.433
c23.682-30.723,51.943-54.21,86.253-72.044C764.118,159.733,799.849,152.492,834.221,151.702L834.221,151.702z"/>
</svg></button>
                            </form>
            @endif
        </div>

        @if($good->louable_achetable == 0)
            <p><strong>Prix :</strong> €/mois {{$good->prix}}</p>
        @else
            <p><strong>Prix :</strong> €{{$good->prix}}</p>
        @endif

        <p><strong>Ville :</strong> {{$good->ville_bien}}</p>
        <p><strong>Code Postal :</strong> {{$good->cpostal_bien}}</p>
        <p><strong>Rue :</strong> {{$good->rue_bien}}</p>

        @if($good->type_bien == 0)
            <p><strong>Type :</strong> Appartement</p>
        @elseif($good->type_bien == 1)
            <p><strong>Type :</strong> Maison</p>
        @else
            <p><strong>Type :</strong> Terrain</p>
        @endif

        <p><strong>Surface :</strong> {{$good->surface_bien}} m2</p>

        @if($good->nbr_piece_bien > 1)
            <p>{{$good->nbr_piece_bien}} pièces</p>
        @else
            <p>{{$good->nbr_piece_bien}} pièce</p>
        @endif
    </div>

    @if(request()->is('my_own/*'))
        @include('components.charts', ['stats' => $stats ?? null])
    @endif
@stop