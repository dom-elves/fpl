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

class APIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //returns player data
    public function index()
    {
        $data = DB::table('players')->get();

        return view('/main')->with(['data' => $data]);
    }

    
    //for some reason, object returns in an array - making it always pos 0 takes it out of array 
    public function returnSelectedPlayer($id)
    {
        $collection = Player::where('id', '=', $id)->get();
        
        $player = $collection[0]; //figure out how to take the object out of the array, casting to object doesn't work somehow?
        
        return view('player')->with(['player' => $player]); 
    }

    
    public function requestPlayers()
    {
      
      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
    
      $decoded = json_decode($response->body());
      // dd($decoded);
      $players = $decoded->elements;
      // dd($players);
      $query = DB::table('players')->get()->first();

      // dd($players[430]);

      if ($query) {
        DB::table('players')->truncate();

        foreach ($players as $player) {
          //figure out how to add individual rank, team, historical costs and total games 
          DB::table('players')->insert([
            'player_id' => $player->id,
            'first_name' => $player->first_name,
            'last_name' => $player->second_name,
            'team' => $player->team,
            'total_points_season' => $player->total_points,
            'total_points_week' => $player->event_points,
            'points_per_game' => $player->points_per_game,
            'current_cost' => $player->now_cost,
            'start_cost' => null,
            'goals_scored' => $player->goals_scored,
            'goals_assisted' => $player->assists,
            'goals_conceded' => $player->goals_conceded,
            'clean_sheets' => $player->clean_sheets,
            'own_goals' => $player->own_goals,
            'penalties_saved' => $player->penalties_saved,
            'penalties_missed' => $player->penalties_missed,
            'yellow_cards' => $player->yellow_cards,
            'red_cards' => $player->red_cards,
            'saves' => $player->saves,
            'bonus_points_season' => $player->bonus,
            'form' => $player->form,
            'minutes_season' => $player->minutes,
            'transfers_in_week' => $player->transfers_in_event,
            'transfers_out_week' => $player->transfers_out_event,
          ]);
        }
        return redirect('/main');
      }
    }
}
