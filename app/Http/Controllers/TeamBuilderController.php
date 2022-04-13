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
          
        $teams = DB::table('teams')->get();

        return view('/make-a-team', ['players' => $players, 'teams' => $teams]);
    }

}
