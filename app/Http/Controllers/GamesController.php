<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\User;
use DateTime;
use Cookie;
use App\Services\AuthService;
use App\Services\GameService;
use App\Services\TransactionService;
use App\Services\UserService;
use App\Services\GameCreditsService;

class GamesController extends Controller
{
    public function __construct() {
        $this->authService = new AuthService;
        $this->gameService = new GameService;
        $this->transactionService = new TransactionService;
        $this->userService = new UserService;
        $this->gameCreditsService = new GameCreditsService;
    }

    public function init() {
        $gamesList = Game::all();
        return view('game.games', compact('gamesList'));
    }
    
    public function playGame(Game $game) {
        $user = $this->userService->getUserAccount();
        if ($user) {
            return $this->gameService->playGame($user, $game);
            // return 1;
        }
    }
    public function logout() {
        $this->userService->logoutByPartnerGames();
    }

    public function show(Game $game) {
        $currency = '';
        $user = $this->userService->getUserAccount();
        $partnerGamesAccount = $this->gameCreditsService->checkBalance($game, $currency,$user);
        return view('game.gameInfo', compact('game', 'partnerGamesAccount'));
    }
}
