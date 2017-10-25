<?php

namespace App\Services;
use App\Services\DfsService;
class GameService extends BaseService{

    public function __construct() {
        $this->dfsService = new DfsService;
    }
    
    public function getGames() {
        return $this->get('test');
    }

    public function playGame($user, $game) {
        if($game->id == 1) {
            return $this->dfsService->play($user);
        }
    }
}