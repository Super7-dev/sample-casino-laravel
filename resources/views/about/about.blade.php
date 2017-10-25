@extends('layout') @section('content')
<div class="content">
    <div class="title m-b-md">
        About Page
    </div>

    <div class="links">
        @if(empty($people)) There is no people @else
        <div>I Have People</div>
        <div>Yes</div>
        @endif @foreach($people as $person)
        <li>
            {{$person}}
        </li>
        @endforeach
    </div>
</div>

@stop