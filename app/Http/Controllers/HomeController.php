<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;

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
        $this->middleware('verified');
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
                $dateM = carbon::today()->subDays(30);
                $dateS = carbon::today()->subDays(30);
                $client = User::where('statut',0)->get();
                $clientM = User::where('statut',0)->where('updated_at','>',$dateM)->get();
                $clientS = User::where('statut',0)->where('updated_at','>',$dateM)->get();
                $agent = User::where('statut',1)->get();
                $venteM = 0;
                $venteS = 0;
                $vente = 0;
                $clientT = 0;
                $credit = 0;
                $agentT = 0;
                foreach($client as $cl){

                    $vente += $cl->affaire;
                    $clientT ++;
                    $credit += $cl->credit;

                }
                foreach($agent as $ag){

                    $agentT ++;

                }
                foreach($clientM as $ag){

                    $venteM +=$cl->affaire;

                }
                foreach($clientS as $ag){

                    $venteS +=$cl->affaire;

                }
                return view('Admin.Home')->with(['vente'=> $vente,'clientT'=>$clientT,'credit'=>$credit,'agentT'=>$agentT,'venteM'=>$venteM,'venteS'=>$venteS]);
            }else {
                return view('acces');
            }

        }
    }
}
