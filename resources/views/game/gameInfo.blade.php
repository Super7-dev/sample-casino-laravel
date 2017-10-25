@extends('staticLayout')


@section('bodyContent')
    <body background="{{$game->gameBackgroundImageUrl}}" class="font-white top-gap">
        <div class="game-container">    
            <div class="center-content">
                <img src="{{$game->gameImageUrl}}" height="100" width="100"/>
            </div>
            <div class="game-title center-content pointer">
                <a href="/game/{{$game->id}}/play">
                {{$game->gameName}} ({{$game->gameCode}})
                </a>
            </div>
            <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 game-current-balance center-content">
                Your Current Balance: 
                <span class="balance"> 
                    {{$partnerGamesAccount['currency']}} {{$partnerGamesAccount['balance']}}
                </span>
            </div>
            <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 game-current-balance center-content">
                <a href="/game/{{$game->id}}/withdraw" class='pointer withdraw-balance'>WITHDRAW BALANCE</a>
            </div>
            <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 game-description">
                {{$game->gameDescription}}
            </div>
        </div>    
    </body>
@stop