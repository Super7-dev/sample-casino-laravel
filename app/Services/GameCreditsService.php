<?php

namespace App\Services;
use App\Services\DfsService;

class GameCreditsService extends BaseService {

    public function __construct() {
        $this->dfsService = new DfsService;
    }

    public function checkBalance($game,$currency, $user) {
        if ($game->id == 1) {
            return $this->dfsService->balanceInquiry($user, $currency);
        }
        return 0;
    }
}