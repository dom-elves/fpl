<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TableAPIController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\GameweekController;
use App\Http\Controllers\LiveTableController;


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

Route::get('/', function () {
    return view('welcome');
});

//initial main view, returns $players and $teams
Route::get('/main', [TeamsController::class, 'index']);

//updates teams data - doesn't really need to be used but cba to manually enter data
Route::get('update-teams', [TeamsController::class, 'updateTeams']);

//generates views based on player selected
Route::get('/player/{id}', [PlayerController::class, 'returnSelectedPlayer']);

//for searching by player name
Route::get('/search-player', [PlayerController::class, 'returnSearchedPlayer']);

//runs API call for player data- used by 'update' button on main page
Route::get('/update-players', [PlayerController::class, 'requestPlayers']);

//gameweeks page view
Route::get('/gameweeks', [GameweekController::class, 'index']);

//runs api call for gameweek data
Route::get('/update-gameweeks', [GameweekController::class, 'requestGameweeks']);

