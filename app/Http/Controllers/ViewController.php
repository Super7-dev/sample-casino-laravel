<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cookie;
use App\Account;
use App\Credit;
use App\Game;
use App\Transaction;
use App\User;
use App\Services\AuthService;
use App\Services\GameService;
use App\Services\TransactionService;
use App\Services\UserService;
use App\Services\GameCreditsService;


class ViewController extends Controller
{
    public function __construct() {
        $this->authService = new AuthService;
        $this->gameService = new GameService;
        $this->transactionService = new TransactionService;
        $this->userService = new UserService;
        $this->gameCreditsService = new GameCreditsService;
    }

    public function gameWithdrawLayout(Game $game) {
        // return view('withdraw.withdraw');

        $currency = '';
        $user = $this->userService->getUserAccount();
        return $game;
    }

    public function gamesListLayout() {
        $gamesList = Game::all();
        return view('game.games', compact('gamesList'));
    }

    public function gameByIdLayout(Game $game) {
        $currency = '';
        $user = $this->userService->getUserAccount();
        $partnerGamesAccount = $this->gameCreditsService->checkBalance($game, $currency,$user);
        return view('game.gameInfo', compact('game', 'partnerGamesAccount'));
    }

    public function dashboardLayout() {

    }

    public function depositLayout() {
        $gamesList = Game::get();
        $id = Cookie::get('id');
        $status = '';
        $creditAccount = User::find($id)->credit;
        return view('deposit.deposit', compact('creditAccount', 'gamesList', 'status'));
    }

    public function loginLayout() {

    }
}
