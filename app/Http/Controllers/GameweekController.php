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
          
        foreach ( $gameweeks as $gameweek ) {
          
          //this is in a function below, saves having to loop four times & can be accessed in other areas
          $this->applyPlayerDetails($gameweek);

        }
       
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

    public function applyPlayerDetails($gameweek) 
    {
        //most selected
        $msp_first_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->first_name;
          
        $msp_last_name = Gameweek::find($gameweek->id)->mostSelectedPlayer->last_name;

        $msp_player_team = Player::find($gameweek->most_selected_player)->getPlayerTeam;

        $msp_player_name = $msp_first_name . " " . $msp_last_name;
        
        $gameweek->most_selected_player = ['player_name' => $msp_player_name, 'player_team' => $msp_player_team->team_short_name, 'category' => 'MSP'];
        
        //highest scoring
        $hsp_first_name = Gameweek::find($gameweek->id)->highestScoringPlayer->first_name;
        
        $hsp_last_name = Gameweek::find($gameweek->id)->highestScoringPlayer->last_name;
        
        $hsp_player_team = Player::find($gameweek->highest_scoring_player)->getPlayerTeam;

        $hsp_player_name = $hsp_first_name . " " . $hsp_last_name;
        
        $gameweek->highest_scoring_player = ['player_name' => $hsp_player_name, 'player_team' => $hsp_player_team->team_short_name, 'category' => 'HSP'];
        
        //most captained
        $mcp_first_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->first_name;
          
        $mcp_last_name = Gameweek::find($gameweek->id)->mostCaptainedPlayer->last_name;
        
        $mcp_player_team = Player::find($gameweek->most_captained_player)->getPlayerTeam;

        $mcp_player_name = $mcp_first_name . " " . $mcp_last_name;
        
        $gameweek->most_captained_player = ['player_name' => $mcp_player_name, 'player_team' => $mcp_player_team->team_short_name, 'category' => 'MCP'];
        
        //most vice captained
        $mvcp_first_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->first_name;
          
        $mvcp_last_name = Gameweek::find($gameweek->id)->mostViceCaptainedPlayer->last_name;
        
        $mvcp_player_team = Player::find($gameweek->most_vice_captained_player)->getPlayerTeam;

        $mvcp_player_name = $mvcp_first_name . " " . $mvcp_last_name;

        $gameweek->most_vice_captained_player = ['player_name' => $mvcp_player_name, 'player_team' => $mvcp_player_team->team_short_name, 'category' => 'MVCP'];
        
        //most transferred in
        $mtip_first_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->first_name;
          
        $mtip_last_name = Gameweek::find($gameweek->id)->mostTransferredInPlayer->last_name;
        
        $mtip_player_team = Player::find($gameweek->most_transferred_in_player)->getPlayerTeam;

        $mtip_player_name = $mtip_first_name . " " . $mtip_last_name;
        
        $gameweek->most_transferred_in_player = ['player_name' => $mtip_player_name, 'player_team' => $mtip_player_team->team_short_name, 'category' => 'MTIP'];

        return $gameweek;        
    }
}
