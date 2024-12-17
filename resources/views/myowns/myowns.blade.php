@extends('layout.app')

@section('content')
    <h1 id="title">Mes biens</h1>

    @include('components.owns', ['goods' => $goods ?? null])
@stop
