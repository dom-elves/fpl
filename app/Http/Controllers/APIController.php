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

    public function request()
    {

      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');

      $decoded = json_decode($response->body());
      
      $players = $decoded->elements;

      $data = DB::table('players')->get()->first();

      // dd($players);

      if ($data) {
        DB::table('players')->truncate();

        foreach ($players as $player) {
          //figure out how to add individual rank and historical costs and total games 
          DB::table('players')->insert([
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
            'bonus_points_week' => $player->bonus,
            'bonus_points_season' => $player->bps,
            'form' => $player->form,
            'minutes_season' => $player->minutes,
            'transfers_in_week' => $player->transfers_in_event,
            'transfers_out_week' => $player->transfers_out_event,
          ]);
          
        }
      }

      return view('/main');
    }
}
