<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
            if(Auth::user()->statut == 1){
                return view('voyants.Home');

            }elseif(Auth::user()->statut == 0){
                return view('welcome');
            }elseif(Auth::user()->statut == 2){
                return view('Admin.Home');
            }

        }
    }
}
