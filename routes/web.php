<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TableAPIController;
use App\Http\Controllers\DataController;
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

//initial main view
Route::get('/main', [PlayerController::class, 'index']);

//generates views based on player selected
Route::get('/player/{id}', [PlayerController::class, 'returnSelectedPlayer']);

//runs API call for player data- used by 'update' button on main page
Route::get('/update-players', [PlayerController::class, 'requestPlayers']);

//gameweeks page view
Route::get('/gameweeks', [GameweekController::class, 'index']);

//runs api call for gameweek data
Route::get('/update-gameweeks', [GameweekController::class, 'requestGameweeks']);


//runs API call for table data - same as above
// Route::get('/update-table', [TableAPIController::class, 'request']);




// Route::get('/test', function () {
//   return view('test');
// });
