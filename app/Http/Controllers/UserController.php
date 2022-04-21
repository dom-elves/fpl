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

        $existing_user = DB::Table('users')->where('name', $new_user)->get()->first();

        $existing_email = DB::Table('users')->where('email', $new_email)->get()->first();

        if ($existing_email && $existing_user) {

            $request->session()->flash("failure", "This account already exists");
            return view('/login');
        }

        if ($existing_user) {
            
            $request->session()->flash("failure", "Username '" . $new_user . "' already exists");
            return view('/login');
        }

        if ($existing_email) {
            
            $request->session()->flash("failure", "Email '" . $new_email . "' is already is use");
            return view('/login');
        }


        User::create([

            'name' => $new_user,
            'email' => $new_email,
            'password' => $new_password,
        ]);

        $request->session()->flash('success', 'Account created successfully!');

        return view('/login');
    }
}