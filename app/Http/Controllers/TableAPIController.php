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
use Illuminate\Support\Facades\Http\Client;


class TableAPIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function request()
    {
        // $response = Http::get("https://heisenbug-premier-league-live-scores-v1.p.rapidapi.com/api/premierleague/table?rapidapi-key=995ecfdb09mshe3f76a09feaa46ap10fc45jsna6f822bd5c56");

        // dd($response);
        //try and find one of these that's actually free like what the hell 

        $decoded = json_decode($response);

        dd($decoded);

      if ($query) {
        DB::table('players')->truncate();
      }
    }
}
