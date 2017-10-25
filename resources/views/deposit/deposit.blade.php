@extends('staticLayout')


@section('bodyContent')
    <body>
        <div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-sm-12 col-xs-12 deposit-container top-gap">
            <div class="deposit-title center-content col-md-12 col-lg-12 col-xs-12 col-sm-12 top-gap">
                DEPOSIT
            </div>
            <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 user-information top-gap bottom-gap">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                </div>
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 pull-right">
                    Current Balance: {{$creditAccount->balance}}
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 deposit-body">
                {!! Form::open(['url' => 'deposit']) !!}

                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 bottom-gap top-gap">
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 deposit-info">
                            Deposit To:
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 deposit-value">
                            <select class="form-control" name="depositTo" required>
                                <option disabled selected value="">SELECT GAME HERE</option>
                                @foreach($gamesList as $game)
                                    <option value="{{$game->id}}">{{$game->gameName}} ({{$game->gameCode}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 deposit-info">
                            Amount:
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 deposit-value">
                            <input type="number" name="amount" step='0.01' class="form-control" min="1" value='0' max="{{$creditAccount->balance}}" required/>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bottom-gap top-gap center-content">
                        <input type="submit" value='DEPOSIT' class="btn btn-primary"/>
                    </div>
                    
                    @if($status)
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 message-container bottom-gap center-content {{$status}}-message-color">
                            {{$status}}
                        </div>
                    @endif
                {!! Form::close() !!}
            </div>
        </div>
    </body>
@stop