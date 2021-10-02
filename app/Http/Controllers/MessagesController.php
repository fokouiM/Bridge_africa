<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\message;
use App\Models\User;

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
        $this->middleware('verified');
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
            $message = message::where('id_user',Auth::user()->id)->where('name_voyant',$request->name_agent)->orderBy('created_at')->get();
            return view('message')->with( ['message'=> $message,'name_agent'=>$name_agent]);

            }elseif(Auth::user()->statut == 1 ){

                $name_agent = $request->name_agent;
            return view('agent.message')->with('name_agent', $name_agent);
            }else{
                return view('acces');
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $key = message::where('id_user',Auth::user()->id )->where('statut',1)->orderBy('id', 'desc')->first()->count();
        if(Auth::user()->credit >= 1){
            if($key > 0){
                $v2 = 'Vieille patienté qu\'ont répond a votre message';

                return redirect()->route('message',['v2'=>$v2,'name_agent'=>$request->name_voyant]);
            }else{
                $user = User::where('id',Auth::user()->id)->first();
                $message = new message;
                $message->id_user = $request->id_user;
                $message->name_voyant = $request->name_voyant;
                $message->name_user = Auth::user()->name;
                $message->message = $request->message;
                $message->statut = 1;
                $message->statut_client = $user->statut_client;
                $message->save();
                $credit = $user->credit -1;

                User::where('id',Auth::user()->id)->update(['credit' => $credit,]);

                return redirect()->route('message',['name_agent'=>$request->name_voyant]);
            }

        }else{
            $v2 = 'credit insuffisant';

            return redirect()->route('message',['v2'=>$v2,'name_agent'=>$request->name_voyant]);
        }
    }
}
