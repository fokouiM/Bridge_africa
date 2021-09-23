<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
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
     * Display a listing of the resource.
     *
     * * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset(Auth::user()->id)) {
            if(Auth::user()->statut == 0 ){

                $name_agent = $request->name_agent;
                $route_style_page = "assets/js/pages/custom/chat/chat.js";
            return view('message')->with( 'name_agent', $name_agent);

            }
        }

        if(isset(Auth::user()->statut)){
            if(Auth::user()->statut == 1 ){

                $name_agent = $request->name_agent;
            return view('agent.message')->with('name_agent', $name_agent);
            }
        }
    }
}
