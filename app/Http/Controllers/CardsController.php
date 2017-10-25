<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
class CardsController extends Controller
{
    public function index() {

        $cards = Card::all();
        return view('card.cards', compact('cards'));
    }

    public function show(Card $card) {

        // return $card;
        // $card = Card::find($id);
        return view('card.show', compact('card'));
    }
}
