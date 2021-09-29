<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

                $client = User::where('statut',0)->get();
                $agent = User::where('statut',1)->get();
                $credit = 0;
                foreach($client as $cl){

                    $credit = $credit + $cl->statut;
                }
                dd($credit);
                return view('Admin.Home');
            }else {
                return view('acces');
            }

        }
    }
}
