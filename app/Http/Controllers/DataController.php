<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\APIController;
use App\Providers\AveragesProvider;
use App\Models\Player;

class DataController extends Controller
{
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

    // public function returnPlayerAverages()
    // {
    //     $averageCost = DB::table('players')->avg('current_cost');

    //     dd($averageCost);
    // }

}
