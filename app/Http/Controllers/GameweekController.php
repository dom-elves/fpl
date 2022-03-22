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
use App\Models\Team;

class GameweekController extends Controller
{

    //returns gameweek data
    public function index()
    {
        $gameweeks = DB::table('gameweeks')->get();
          
        //most selected player
        foreach ( $gameweeks as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->first_name;
          
          $last_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->last_name;

          $player_team = Player::find($gameweek->most_selected_player)->getPlayerTeam;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_selected_player = ['player_name' => $player_name, 'player_team' => $player_team->team_short_name];
          // dd($gameweek);
        }

        //highest scoring player
        foreach ( $gameweeks as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->highestScoringPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->highestScoringPlayer->last_name;

          $player_team = Player::find($gameweek->highest_scoring_player)->getPlayerTeam;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_selected_player = ['player_name' => $player_name, 'player_team' => $player_team->team_short_name];
        }

        //most captained player
        foreach ( $gameweeks as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->last_name;

          $player_team = Player::find($gameweek->most_captained_player)->getPlayerTeam;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_captained_player = ['player_name' => $player_name, 'player_team' => $player_team->team_short_name];
        }

        //most vice captained player
        foreach ( $gameweeks as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->last_name;

          $player_team = Player::find($gameweek->most_vice_captained_player)->getPlayerTeam;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_vice_captained_player = ['player_name' => $player_name, 'player_team' => $player_team->team_short_name];
        }

        //most transferred in player
        foreach ( $gameweeks as $gameweek ) {
          
          $first_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->first_name;

          $last_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->last_name;

          $player_team = Player::find($gameweek->most_transferred_in_player)->getPlayerTeam;

          $player_name = $first_name . " " . $last_name;

          $gameweek->most_transferred_in_player = ['player_name' => $player_name, 'player_team' => $player_team->team_short_name];
        }
       
        
        
        // $player_team = Player::find($gameweek->id)->getPlayerTeam;
          
        //   $player_object = [$player_name => $player_team];

        //   dd($player_object);

        //   $player_name = $player_object;
          // dd($gameweek);
        

        $teams = DB::table('teams')->get();

        return view('/gameweeks', ['gameweeks' => $gameweeks, 'teams' => $teams]);
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
