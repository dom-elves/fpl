<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\TableAPIController;
use App\Http\Controllers\DataController;
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
Route::get('/main', [DataController::class, 'index']);

//generates views based on player selected
Route::get('/player/{id}', [DataController::class, 'returnSelectedPlayer']);

//runs API call for player data- used by 'update' button on main page
Route::get('/update-players', [APIController::class, 'request']);

//runs API call for table data - same as above
// Route::get('/update-table', [TableAPIController::class, 'request']);




// Route::get('/test', function () {
//   return view('test');
// });
