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
use App\Models\Gameweek;
use App\Models\Player;

class GameweekController extends Controller
{

    //returns gameweek data
    public function index()
    {
        $data = DB::table('gameweeks')->get();

        //most selected player
        foreach ( $data as $gameweek ) {

          $first_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->last_name;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_selected_player = $player_name;

        }

        //highest scoring player
        foreach ( $data as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->highestScoringPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->highestScoringPlayer->last_name;

          $player_name = $first_name . " " . $last_name;

          $gameweek->highest_scoring_player = $player_name;
        }

        //most captained player
        foreach ( $data as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->last_name;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_captained_player = $player_name;
        }

        //most vice captained player
        foreach ( $data as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->last_name;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_vice_captained_player = $player_name;
        }

        //most transferred in player
        foreach ( $data as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->last_name;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_transferred_in_player = $player_name;
        }


        
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

        if ($gameweek->average_entry_score !== 0) {

            $highestScoringPlayer = $gameweek->top_element_info->id; 
            $highestPlayerScore = $gameweek->top_element_info->points;
            
        } else {
            break;
        }
          DB::table('gameweeks')->insert([
            
            'id' => $gameweek->id,
            'average_team_points' => $gameweek->average_entry_score,
            'highest_team_points' => $gameweek->highest_score,
            'most_selected_player' => $gameweek->most_selected,
            'highest_scoring_player' => $highestScoringPlayer,
            'highest_player_score' => $highestPlayerScore,
            'most_transferred_in_player' => $gameweek->most_transferred_in,
            'most_captained_player' => $gameweek->most_captained,
            'most_vice_captained_player' => $gameweek->most_vice_captained,
          ]);
        }  
      }
      return redirect('/gameweeks');
    }
}
