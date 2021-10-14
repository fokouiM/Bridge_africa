<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\message;
use App\Models\User;
use App\Models\Note_client;
use App\Models\CounvClient;

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
            $date = date('Y n j');

            return view('message')->with( ['message'=> $message,'name_agent'=>$name_agent,'date'=>$date]);

            }elseif(Auth::user()->statut == 1 ){

                $contacts = User::where('statut_m',1)->where('statut',0)->get();
                return response()->json($contacts);
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
        $key = message::where('id_user',Auth::user()->id )->where('statut',1)->orderBy('id', 'desc')->first();
        if(Auth::user()->credit >= 1){
            if($key !== null){
                $v2 = 'Vieille patienté qu\'ont répond a votre message';

                return redirect()->route('message',['v2'=>$v2,'name_agent'=>$request->name_voyant]);
            }else{
                $last_massage = message::where('id_user', Auth::user()->id)->orderBy('id', 'desc')->first();
                if($last_massage === null){

                    $last_massageOne = "personne";
                }else{
                    $last_massageOne = $last_massage->name_agent ;
                }
                $user = User::where('id',Auth::user()->id)->first();
                $message = new message;
                $message->id_user = $request->id_user;
                $message->name_voyant = $request->name_voyant;
                $message->message = $request->message;
                $message->statut = 0;
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

    public function getMessage($id){
        $message = message::where('id_user',$id)->get();
        $user = User::where('id',$id)->first();
        $voyants = CounvClient::where('id_user',$id)->get();
        $note = Note_client::where('id_user',$id)->get();
        $yes = message::where('id_user',$id)->orderBy('created_at', 'desc')->first();
        $Active = $yes->name_voyant;
        return response()->json(['message'=>$message,'user'=>$user,'voyants'=>$voyants,'note'=>$note,'Active'=>$Active]);

    }

    public function send(Request $request){
       $message = message::create([
            'id_user'=>$request->id_user,
            'id_send'=>Auth::user()->id,
            'name_voyant'=>$request->name_voyant,
            'name_agent'=> Auth::user()->name,
            'message'=>$request->message
        ]);
        return response()->json($message);
    }
}
