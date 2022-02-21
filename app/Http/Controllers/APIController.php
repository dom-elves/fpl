<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

class APIController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function request()
    {

      $response = Http::get('https://fantasy.premierleague.com/api/bootstrap-static/');

      $decoded = json_decode($response->body());
      
      return view('/main');
    }
}
