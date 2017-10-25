@extends('layout')


@section('content')

    <div class="col-md-12 col-lg-12">
        <h1>Other Games</h1>
    
        <ul>
            @foreach($gamesList as $game)
                <li>
                    <a href="/game/{{$game->id}}">
                        {{$game->gameName}} ({{$game->gameCode}})
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
@stop