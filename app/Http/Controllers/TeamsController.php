<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\APIController;
use App\Providers\AveragesProvider;
use App\Models\Player;
use Illuminate\Support\Facades\Http;

class TeamsController extends Controller
{

    public function index()
    {
      $teams = DB::table('teams')->get();
      
      $players = DB::table('players')->get();
     
      return view('/main')->with(['teams' => $teams, 'players' => $players]);
    }

    // public static function assignPlayers($team_id)
    // {
    //   $getPlayers = DB::table('players')->where('team', '=', $team_id)->get();

    //   $players = json_encode($getPlayers);

    //   dd($players);
    //   return $players;
    // }

    public static function checkTeam($player, $team) {

      if ($player->team == $team->team_id ) {

        $first_name = $player->first_name;
        $last_name = $player->last_name;
        $position = $player->position;

        $player_name = $position . ' ' . $first_name . ' ' . $last_name;

        return $player_name;
      } 
    }

    public function updateTeams()
    {
      
      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
    
      $decoded = json_decode($response->body());
      
      $teams = $decoded->teams;
      
      $query = DB::table('teams')->get()->first();

      if ($query) {
        DB::table('teams')->truncate();

        foreach ($teams as $team) {
         
          DB::table('teams')->insert([
            'team_id' => $team->id,
            'team_name' => $team->name,
            'team_short_name' => $team->short_name,
          ]);
        }
        return redirect('/main');
      }
    }
}
