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
        // dd($request);
        $new_user = $request->input('new_user');
        $new_email = $request->input('new_email');
        $new_password = $request->input('new_password');

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

        if ($new_user == null || $new_email == null || $new_password == null) {
            $request->session([$new_user, $new_email, $new_password])->flash("failure", "Please fill out all fields");
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

    public function userLogIn(Request $request)
    {
    
        $entered_user = $request->input('enter_user');
        $entered_password = $request->input('enter_password');

        // dd($entered_user, $entered_password);
        $existing_user = DB::Table('users')->where('name', $entered_user)->get()->first();

        $existing_password = DB::Table('users')->where('email', $entered_password)->get()->first();

        if ($existing_password && $existing_user) {

            return redirect('/main');
        } 

        if (!$existing_user) {

            $request->session()->flash("login-failure", "Email '" . $entered_user . "' does not exist");
            return view('/login');
        }

    }
}