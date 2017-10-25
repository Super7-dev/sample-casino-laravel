<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\RouteGuard;
// use Cookie;

Route::get('/', function () {
    if(\Cookie::get('userInfo')) {
        return view('dashboard.dashboard');
    }
    return view('login');
});
Route::get('/login', function () {
    if(\Cookie::get('userInfo')) {
        return view('dashboard.dashboard');
    }
    return view('login');
});
Route::post('/login','UserController@login');
Route::get('/dashboard', function() {
    return view('dashboard.dashboard');
})->middleware(RouteGuard:: class);

Route::get('game/{game}', 'ViewController@gameByIdLayout')->middleware(RouteGuard:: class);
Route::get('game', 'ViewController@gamesListLayout')->middleware(RouteGuard:: class);
Route::get('deposit', 'ViewController@depositLayout')->middleware(RouteGuard:: class);
Route::post('deposit', 'DepositController@deposit')->middleware(RouteGuard:: class);

Route::get('game/{game}/play', 'GamesController@playGame')->middleware(RouteGuard:: class);
Route::get('game/{game}/withdraw', 'ViewController@gameWithdrawLayout')->middleware(RouteGuard:: class);
Route::get('logout', 'UserController@logout');
