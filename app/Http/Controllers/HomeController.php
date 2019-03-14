<?php

namespace App\Http\Controllers;

use App\Agent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = collect(//grab admins data);
        $allusers = User::all();
        $users = collect([]);

        foreach ($allusers as $user){
            if ($admins->contains($user->email)){
                continue;
            }
            $users->push($user);
        }

        if ($admins->contains(Auth::user()->email)){
//            dd(Auth::user()->email);
            $agents = Agent::all();
            //dd($normal_users);
            return view('agents.admin', compact('agents','users'));
        }

        else{
            return view('home');
        }
        //return view('home');
    }

    public function adminIndex()
    {
        $agents = Agent::all();
        return view('agents.admin', compact('agents'));
    }
}
