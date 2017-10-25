<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Services\UserService;
use Cookie;
class UserController extends Controller
{
    public function __construct() {
        $this->userService = new UserService;
    }

    public function login() {
        $username = Input::get('username');
        $password = Input::get('password');
        $result = $this->userService->login($username, $password);
        if ($result->count() > 0) {
            $user = [
                'id' => $result[0]->id,
                'username' => $result[0]->username,
            ];
            Cookie::queue('userInfo', $user);
            return redirect('/dashboard');
        } else {
            return view('login');
        }
    }

    public function logout() {
        Cookie::queue(
            Cookie::forget('userInfo')
        );
        return redirect('/dashboard');
    }
}
