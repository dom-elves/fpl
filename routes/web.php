<?php

use App\Http\Controllers\GameweekController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamBuilderController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

//login
Route::get('/login', [UserController::class, 'login']);

Route::get('/sign-up', [UserController::class, 'signUp']);

Route::get('/user-log-in', [UserController::class, 'userLogIn']);

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

//player comparison
Route::get('player-comparison', [PlayerController::class, 'comparePlayers']);

//player index
Route::get('player-index', [PlayerController::class, 'returnAllPlayers']);

//routes for sorting player index
Route::get('sort-popularity-asc', [PlayerController::class, 'sortPopularityAsc']);
Route::get('sort-popularity-desc', [PlayerController::class, 'sortPopularityDesc']);

Route::get('sort-total-points-asc', [PlayerController::class, 'sortTotalPointsAsc']);
Route::get('sort-total-points-desc', [PlayerController::class, 'sortTotalPointsDesc']);

Route::get('sort-points-this-week-asc', [PlayerController::class, 'sortPointsThisWeekAsc']);
Route::get('sort-points-this-week-desc', [PlayerController::class, 'sortPointsThisWeekDesc']);

Route::get('sort-points-per-game-asc', [PlayerController::class, 'sortPointsPerGameAsc']);
Route::get('sort-points-per-game-desc', [PlayerController::class, 'sortPointsPerGameDesc']);

Route::get('sort-points-per-million-asc', [PlayerController::class, 'sortPointsPerMillionAsc']);
Route::get('sort-points-per-million-desc', [PlayerController::class, 'sortPointsPerMillionDesc']);

Route::get('sort-goals-asc', [PlayerController::class, 'sortGoalsAsc']);
Route::get('sort-goals-desc', [PlayerController::class, 'sortGoalsDesc']);

Route::get('sort-assists-asc', [PlayerController::class, 'sortAssistsAsc']);
Route::get('sort-assists-desc', [PlayerController::class, 'sortAssistsDesc']);

Route::get('sort-start-cost-asc', [PlayerController::class, 'sortStartCostAsc']);
Route::get('sort-start-cost-desc', [PlayerController::class, 'sortStartCostDesc']);

Route::get('sort-now-cost-asc', [PlayerController::class, 'sortNowCostAsc']);
Route::get('sort-now-cost-desc', [PlayerController::class, 'sortNowCostDesc']);

Route::get('sort-cost-change-asc', [PlayerController::class, 'sortCostChangeAsc']);
Route::get('sort-cost-change-desc', [PlayerController::class, 'sortCostChangeDesc']);

//top trumps
Route::get('top-trumps', [PlayerController::class, 'returnTrumpsPlayers']);

//player history
Route::get('player-history', [PlayerController::class, 'updatePlayerHistory']);

Route::get('make-a-team', [TeamBuilderController::class, 'index']);