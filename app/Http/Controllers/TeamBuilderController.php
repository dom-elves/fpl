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
use Illuminate\Http\Request;


class TeamBuilderController extends Controller
{
    public function index()
    {
        
        $players = DB::table('players')->get();

        foreach ($players as $player) {

            $player_team_short = DB::table('teams')->where('team_id', $player->team)->get()->first();
           
            $player->team = $player_team_short->team_short_name;
           
            if ($player->position == 'GK') {
                
                $goalkeepers[] = $player;
            }

            if ($player->position == 'DEF') {
                
                $defenders[] = $player;
            }

            if ($player->position == 'MID') {
                
                $midfielders[] = $player;
            }

            if ($player->position == 'FWD') {
                
                $forwards[] = $player;
            }
        }
       
        return view('/make-a-team', ['goalkeepers' => $goalkeepers, 
                                     'defenders' => $defenders, 
                                     'midfielders' => $midfielders, 
                                     'forwards' => $forwards, 
                                     
                                    ]);
    }

}
