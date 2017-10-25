<?php
namespace App\Services;
use App\User;
use App\Account;
use Cookie;
class UserService extends BaseService{
    
    public function logoutByPartnerGames() {
        echo '<script>alert("logout")</script>';
    }

    public function login($username, $password) {
        return Account::get()->where('username', $username)->where('password', $password);
    }
    
    public function getUserAccount() {
        return User::find($this->getUserCookie()['id'])->account;
    }

    public function getUserInfo() {
        return User::find($this->getUserCookie()['id']);
    }

    public function getUserCookie() {
        return Cookie::get('userInfo');;
    }
}