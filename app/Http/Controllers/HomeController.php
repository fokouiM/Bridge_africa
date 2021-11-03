<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\paylist;

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
                $message = message::where('statut',1)->get();
                return view('voyants.Home')->with('message', $message);


            }elseif(Auth::user()->statut == 0){
                return view('welcome');

            }elseif(Auth::user()->statut == 2){
                $dateone = carbon::today()->subDays(30);
                $dateM = date('Y-m-d H:i:s', strtotime($dateone));
                $dateone = carbon::today()->subDays(7);
                $dateS = date('Y-m-d H:i:s', strtotime($dateone));
                $client = User::where('statut',0)->get();
                $clientM = paylist::where('created_at','>',$dateM)->get();
                $clientS = paylist::where('created_at','>',$dateS)->get();
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

                    $venteM +=$ag->value;

                }
                foreach($clientS as $ag){

                    $venteS +=$ag->value;

                }
                return view('Admin.Home')->with(['vente'=> $vente,'clientT'=>$clientT,'credit'=>$credit,'agentT'=>$agentT,'venteM'=>$venteM,'venteS'=>$venteS]);
            }else {
                return view('acces');
            }

        }
    }
}
