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
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends BaseController
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
        $collection = Player::where('player_id', '=', $id)->get();
        
        $player = $collection[0]; //figure out how to take the object out of the array, casting to object doesn't work somehow?
        
        $team = DB::table('teams')->where('team_id', $player->team)->get()->toArray();
        
        $player->team = $team[0]->team_name;
        
        return view('player')->with(['player' => $player]); 
    }

    public function returnSearchedPlayer(Request $request)
    {
      // dd('here');
      $input = $request->input('search-field');

      
      //returns empty array if user enters complete waffle, error message is in search-result.blade
      $results = DB::table('players')->where('last_name', 'like', '%' . $input . '%')
                                     ->orWhere('first_name', 'like', '%' . $input . '%')
                                     ->get()
                                     ->toArray();
      
      //returning $input allows for custom error to be displayed
      return view('/search-result')->with(['results' => $results, 'input' => $input]);
    }

    
    public function requestPlayers()
    {
      
      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');
    
      $decoded = json_decode($response->body());
      
      $players = $decoded->elements;
      
      $query = DB::table('players')->get()->first();

      if ($query) {

        DB::table('players')->truncate();

        foreach ($players as $player) {
          //manually setting positions because i want them to display as text
          if ($player->element_type == 1) {
            $player->element_type = 'GK';
          }

          if ($player->element_type == 2) {
            $player->element_type = 'DEF';
          }

          if ($player->element_type == 3) {
            $player->element_type = 'MID';
          }

          if ($player->element_type == 4) {
            $player->element_type = 'FWD';
          }

          DB::table('players')->insert([

            'player_id' => $player->id,
            'first_name' => $player->first_name,
            'last_name' => $player->second_name,
            'team' => $player->team,
            'position' => $player->element_type,
            'total_points_season' => $player->total_points,
            'total_points_week' => $player->event_points,
            'points_per_game' => $player->points_per_game,
            'current_cost' => $player->now_cost,
            'start_cost' => null, //need to look into cost stuff again at some point
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
            'percent_selected' => $player->selected_by_percent
          ]);

        }
        return redirect('/main');
      }
    }

    public function comparePlayers(Request $request)
    {
      $input_1 = $request->input('search-input-1');
      $input_2 = $request->input('search-input-2');

      if ($input_1 == null && $input_2 == null ) {

        $search_results = ['No player names have been entered', '']; //this is absolutely a cheating way of doing this but i'll come back to it when i can at least return players
        $search_results_json = json_encode($search_results);

        return view('/player-comparison')->with(['search_results_json' => $search_results_json]);

      }

      $search_result_1 = DB::table('players')->where('last_name', $input_1)
                                     ->get();
                                     
                                     

      $search_result_2 = DB::table('players')->where('last_name', $input_2)
                                     ->get();
                                     
                                     
      // dd($search_result_2, $search_result_2);

      $player_1 = json_encode($search_result_1); 
      $player_2 = json_encode($search_result_2); 
          
      return view('/player-comparison')->with(['player_1' => $player_1, 'player_2' => $player_2]);
    }
}
