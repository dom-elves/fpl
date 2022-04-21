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
use App\Models\User;


class UserController extends Controller
{
    public function login()
    {
        return view('/login');
    }

    public function signUp(Request $request)
    {
        
        $new_user = $request->input('new_user');
        $new_email = $request->input('new_email');
        $new_password = $request->input('new_password');
        
        // dd($new_user, $new_email, $new_password);

        User::create([

            'name' => $new_user,
            'email' => $new_email,
            'password' => $new_password,
        ]);

        
    }
}