@extends('layout')

@section('content')
    <h1>Cards</h1>
    @foreach($cards as $card)
        <a href="{{$card->path()}}"><h3>{{$card->title}}</h3></a>
    @endforeach
@stop