@extends('layout.app')

@section('content')
    <style>

    </style>
    <body>
    <h1 id="title">Accueil</h1>

    <form id="search_form" METHOD="POST" action="{{route('search')}}">
        @csrf
        <input type="text" id="search_value" name="search_value" placeholder="Rechercher">
        <button type="submit" id="send_search" name="send_search"><svg id="search_icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">
<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                <g><g><g><path fill="#000000" d="M86.2,10.4C70.4,12,54.4,18.6,41.8,28.7c-5,4-13.2,12.8-16.5,17.7C9.8,69.1,5.9,96,14.4,122.1c2.1,6.4,7.2,16.5,11.1,22.1c4.3,6,14.8,16.5,20.7,20.7c5.6,3.9,14.6,8.5,21.4,10.8c22.9,7.8,48.7,5.5,69.5-6.4l4.8-2.7l39.1,39c37.1,37,39.2,39,41.7,39.8c3.8,1.2,8.4,0.8,11.8-1c3.2-1.8,9.1-7.9,10.5-11c1.5-3.3,1.5-9.3-0.1-12.3c-0.8-1.5-12.9-14.1-39.6-40.7l-38.5-38.6l2.7-4.8c4.7-8.3,8.2-18,10-27.9c1.3-7.2,1.2-21-0.2-28.9c-2.1-11.7-7.5-24.7-14.1-34.1c-4.3-6-14.8-16.5-20.7-20.7C127.8,13.7,106.5,8.3,86.2,10.4z M104.5,38c11.6,1.9,21.7,7,30.3,15.2c7.3,6.9,12.3,14.8,15.2,23.6c2.2,6.8,2.7,10.6,2.7,18.3c0,16.4-5.2,29.1-16.9,40.7c-10.9,10.8-22.8,16.2-38,17c-19.2,1-37.6-7.8-49.2-23.4c-10.6-14.3-14-33-9.1-50.4c1.5-5.1,5.8-14,8.8-17.9C61.7,43.3,83.1,34.6,104.5,38z"/></g></g></g>
</svg></button>
    </form>



    @include('components.owns', ['goods' => $goods ?? null])

    </body>
@stop
