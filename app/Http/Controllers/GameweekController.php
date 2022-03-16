<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class GameweekController extends Controller
{

    //returns gameweek data
    public function index()
    {
        $data = DB::table('gameweeks')->get();
        
        return view('/gameweeks')->with(['data' => $data]);
    }

    public function requestGameweeks() 
    {
      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');

      $decoded = json_decode($response->body());
      
      $gameweeks = $decoded->events;

      $query = DB::table('gameweeks')->get()->first();
      
      if ($query) {

        DB::table('gameweeks')->truncate();

        foreach ($gameweeks as $gameweek) {
          DB::table('gameweeks')->insert([
            'id' => $gameweek->id,
            'average_team_points' => $gameweek->average_entry_score,
            'highest_team_points' => $gameweek->highest_score,
            'most_selected_player' => $gameweek->most_selected,
            'highest_scoring_player' => $gameweek->top_element,
            'most_transferred_in_player' => $gameweek->most_transferred_in,
            'most_captained_player' => $gameweek->most_captained,
            'most_vice_captained_player' => $gameweek->most_vice_captained,
          ]);
        }  
      }
      // return redirect('/gameweeks');
    }
}
