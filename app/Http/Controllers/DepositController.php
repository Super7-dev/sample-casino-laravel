<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TransactionService;
use App\Services\DfsService;
use Illuminate\Support\Facades\Input;
use App\Game;
use App\User;
use Cookie;

class DepositController extends Controller
{
    public function __construct() {
        $this->transactionService = new TransactionService;
        $this->dfsService = new DfsService;
    }

    public function init() {
        $gamesList = Game::get();
        $id = Cookie::get('id');
        $status = '';
        $creditAccount = User::find($id)->credit;
        return view('deposit.deposit', compact('creditAccount', 'gamesList', 'status'));
    }

    public function deposit() {
        $gamesList = Game::get();
        $user = Cookie::get('userInfo');
        $creditAccount = User::find($user['id'])->credit;
        $userAccount = User::find($user['id'])->account;
        $depositTo = Input::get('depositTo');
        $amount = Input::get('amount');
        $status = '';
        if ($depositTo == 1) {
            $status = $this->dfsService->deposit($amount,$userAccount);
        }

        if ($status == 'success') {
            $this->transactionService->transaction($amount, $user, $depositTo);
        }
        return view('deposit.deposit', compact('creditAccount', 'gamesList', 'status'));
    }
}
