<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Agent;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('agents.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd(Auth::user()->name);

        //dd($request);

        $this->validate(request(),[
            'issuehandled' => 'required|integer',
            'clientsatisfied' => 'required',
            'clientconfidence' => 'required',
            'inlineRadioOptions' => 'required'
        ]);

        $agent = new Agent;

        $agent->date = Carbon::now()->toDateString();
        $agent->agent = Auth::user()->name;
        $agent->issue_number = $request->issuehandled;
        $agent->satisfaction = $request->clientsatisfied;
        $agent->confidence = $request->clientconfidence;
        $agent->rating = $request->inlineRadioOptions;

        $agent->save();

        return redirect()->back()->with('message', 'Your details have been saved. Thanks');
    }

    /**
     * Display all records
     */
    public function showAll()
    {
        //
        $username = Auth::user()->name;
        $agents = Agent::where('agent', '=', $username)->get();
        return view('agents.view',compact('agents'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
