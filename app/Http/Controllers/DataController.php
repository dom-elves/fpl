<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\APIController;
use App\Providers\AveragesProvider;

class DataController extends Controller
{
    //returns player data
    public function index()
    {
        $data = DB::table('players')->get();

        return view('/main')->with(['data' => $data]);
    }

    //acts as updating api data from 'update' button on /main
    public function update()
    {
        APIController::request();
    }

    //for some reason, object returns in an array - making it always pos 0 takes it out of array 
    public function returnSelectedPlayer($id)
    {
        $collection = DB::table('players')->where('id', '=', $id)->get();
    
        $player = (object)collect($collection);

        return view('player')->with(['player' => $player[0]]); 
    }

    public function returnPlayerAverages()
    {
        $averageCost = DB::table('players')->avg('current_cost');

        dd($averageCost);
    }
}
