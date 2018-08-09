<?php

namespace App\Http\Controllers;

use App\Agent;
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

        if (Auth::user()->email == 'edmund.kumasa@gcnetghana.com'){
//            dd(Auth::user()->email);
            $agents = Agent::all();
            return view('agents.admin', compact('agents'));
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
