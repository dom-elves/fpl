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

          //for calcing player points per 90min rather than calcing in vue component
        
          if ($player->minutes == 0) {

            continue;
  
          }

          $games = $player->minutes / 90;
          $pp90 = $player->total_points / $games;
  
          $player->points_per_90 = $pp90;

           
          //value?
          $player->value = $player->total_points / $player->now_cost;
          
          //insert player data
          DB::table('players')->insert([

            'player_id' => $player->id,
            'first_name' => $player->first_name,
            'last_name' => $player->second_name,
            'team' => $player->team,
            'position' => $player->element_type,
            'total_points_season' => $player->total_points,
            'total_points_week' => $player->event_points,
            'points_per_game' => $player->points_per_game,
            'points_per_90' => $player->points_per_90,
            'value' => $player->value * 10, //to calculate points per million spent
            'current_cost' => $player->now_cost,
            'start_cost' => $player->now_cost - $player->cost_change_start,
            'cost_change' => $player->cost_change_start,
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
            'percent_selected' => $player->selected_by_percent,
            
          ]);
          //below snippet is for adding player points by week
          $gameweeks = $decoded->events;

          // DB::table('player_score_history')->truncate();
          
          foreach ($gameweeks as $gameweek) {

            if ($gameweek->is_current == false ) {

              continue;

              if ($gameweek->is_current == true) {

                $current = $gameweek->id;
                $current_gameweek = 'gameweek_' . $current;

                DB::table('player_score_history')->insert([

                  'player_id' => $player->id,
                  'first_name' => $player->first_name,
                  'last_name' => $player->second_name,
                  $current_gameweek => $player->event_points
                ]);
              }
            }
          }

        }


        return redirect('/main');
      }
    }

    public function comparePlayers(Request $request)
    {
      $input_1 = $request->input('search-input-1');
      $input_2 = $request->input('search-input-2');

      //sets everything blank for initial page load, player_lists are used for when multiple records are returned e.g. searching 'james'
      if ($input_1 == null && $input_2 == null ) {

        $player_1 = '';
        $player_2 = '';
        $player_list_1 = '';
        $player_list_2 = '';
        
        return view('/player-comparison')->with(['player_1' => $player_1, 'player_2' => $player_2, 'player_list_1' => $player_list_1, 'player_list_2' => $player_list_2]);

      }

      $player_1 = DB::table('players')->where('player_id', $input_1)
                                      ->orWhere('last_name', 'like', '%' . $input_1 . '%')
                                     ->orWhere('first_name', 'like', '%' . $input_1 . '%')
                                     ->get();
                                     
                                                               

      $player_2 = DB::table('players')->where('player_id', $input_2)
                                      ->orWhere('last_name', 'like', '%' . $input_2 . '%')
                                      ->orWhere('first_name', 'like', '%' . $input_2 . '%')
                                      ->get();
                                                                    
      
      //check for multiple records on a search term, returns lists instead of going straight to player                    
      if ( count($player_1) > 1 || count($player_2) > 1 ) {
        
        
        $player_list_1 = $player_1;
        $player_list_2 = $player_2;

        $player_1 = '';
        $player_2 = '';

        return view('/player-comparison')->with(['player_1' => $player_1, 'player_2' => $player_2, 'player_list_1' => $player_list_1, 'player_list_2' => $player_list_2]);

      }
     
      $player_list_1 = '';
      $player_list_2 = '';
          
      //for if both search terms are unique e.g. searching for 'kane' and 'foden'
      return view('/player-comparison')->with(['player_1' => $player_1, 'player_2' => $player_2, 'player_list_1' => $player_list_1, 'player_list_2' => $player_list_2]);
    }

    public function returnAllPlayers()
    {
        $players = DB::table('players')->get();
        
        return view('/player-index')->with(['players' => $players]);
    }

    //sort by popularity
    public function sortPopularityAsc() 
    {
      $players = DB::table('players')->orderBy('percent_selected', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortPopularityDesc() 
    {
      $players = DB::table('players')->orderBy('percent_selected', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by total points
    public function sortTotalPointsAsc() 
    {
      $players = DB::table('players')->orderBy('total_points_season', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortTotalPointsDesc() 
    {
      $players = DB::table('players')->orderBy('total_points_season', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by points this week
    public function sortPointsThisWeekAsc() 
    {
      $players = DB::table('players')->orderBy('total_points_week', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortPointsThisWeekDesc() 
    {
      $players = DB::table('players')->orderBy('total_points_week', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by points per game
    public function sortPointsPerGameAsc() 
    {
      $players = DB::table('players')->orderBy('points_per_game', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortPointsPerGameDesc() 
    {
      $players = DB::table('players')->orderBy('points_per_game', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by points per million
    public function sortPointsPerMillionAsc() 
    {
      $players = DB::table('players')->orderBy('value', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortPointsPerMillionDesc() 
    {
      $players = DB::table('players')->orderBy('value', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by goals
    public function sortGoalsAsc() 
    {
      $players = DB::table('players')->orderBy('goals_scored', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortGoalsDesc() 
    {
      $players = DB::table('players')->orderBy('goals_scored', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by assists
    public function sortAssistsAsc() 
    {
      $players = DB::table('players')->orderBy('goals_assisted', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortAssistsDesc() 
    {
      $players = DB::table('players')->orderBy('goals_assisted', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by start cost
    public function sortStartCostAsc() 
    {
      $players = DB::table('players')->orderBy('start_cost', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortStartCostDesc() 
    {
      $players = DB::table('players')->orderBy('start_cost', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by now cost
    public function sortNowCostAsc() 
    {
      $players = DB::table('players')->orderBy('current_cost', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortNowCostDesc() 
    {
      $players = DB::table('players')->orderBy('current_cost', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    //sort by cost change
    public function sortCostChangeAsc() 
    {
      $players = DB::table('players')->orderBy('cost_change', 'ASC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }

    public function sortCostChangeDesc() 
    {
      $players = DB::table('players')->orderBy('cost_change', 'DESC')->limit(25)->get();
 
      return view('/player-index')->with(['players' => $players]);
    }


    //change this to decide how many players will be in the deck
    public function returnTrumpsPlayers()
    {
        $deck = DB::table('players')->orderBy('total_points_season', 'DESC')->limit(30)->get();
        
        return view('/top-trumps')->with(['deck' => $deck]);
    }
}
