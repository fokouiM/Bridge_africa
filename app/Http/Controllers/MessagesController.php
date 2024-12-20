<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\message;
use App\Models\User;
use App\Models\Note_client;
use App\Models\CounvClient;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Cookie;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use App\Models\Liste_tag;
use Pusher\Pusher;
use DateTime;

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
    public function index($voyant)
    {
        if(isset(Auth::user()->id)) {
            if(Auth::user()->statut == 0 ){
                $name_agent = $voyant;
                $message = message::where('id_user',Auth::user()->id)->where('name_voyant',$name_agent)->orderBy('created_at')->get();
                $date = date('Y n j');

                // dd($date);
                return view('message')->with( ['message'=> $message,'name_agent'=>$name_agent,'date'=>$date]);

            }elseif(Auth::user()->statut == 1 ){

                dd($voyant);
                $contacts = User::where('statut_m',1)->where('statut',0)->get();
                return response()->json($contacts);
            }else{
                return view('acces');
            }
        }

    }

    public function indexOne()
    {
        if(isset(Auth::user()->id)) {
            if(Auth::user()->statut == 1 ){

                $contacts = User::where('statut_m',1)->where('statut',0)->get()
                ->map(function ($item, $key) {
                    $message = message::where('id_user',$item->id)->latest()->first();
                    $data = [
                        "id"=> $item->id,
                            "name"=> $item->name,
                            "email"=> $item->email,
                            "pub"=> $item->pub,
                            "statut"=> $item->status,
                            "statut_m"=> $item->sattus,
                            "credit"=> $item->credit,
                            "chiffre"=> $item->chiffre,
                            "img_profil"=> $item->img_profil,
                            "email_verified_at"=> $item->email_verified_at,
                            "mollie_customer_id"=> $item->mollie_customer_id,
                            "created_at"=> $item->created_at,
                            "updated_at"=> $item->updated_at,
                            "statut_client"=> $item->statut_client,
                            "name_agent"=> $item->name_agent,
                            "name_voyant"=>$message->name_voyant,
                            "affaire"=> $item->affaire,];
                    return $data;
                });
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

                User::where('id',Auth::user()->id)->update(['credit' => $credit,'statut_m' => 1]);

                return redirect()->route('message',['name_agent'=>$request->name_voyant]);
            }

        }else{
            $v2 = 'credit insuffisant';

            return redirect()->route('message',['v2'=>$v2,'name_agent'=>$request->name_voyant]);
        }
    }

    public function getMessage($id, $voyant){
        $message1 = message::where('id_user',$id)->where('name_voyant',$voyant)->orderBy('created_at', 'desc')->take(60)->get()->sortBy('created_at')
        ->map(function ($item, $key) {
            $str = date('d/m/y', strtotime(Carbon::now()));
            $dateshare = date('d/m/y', strtotime($item->created_at));
            $dateTime = new DateTime($item->created_at);
            $timestamp = $dateTime->getTimestamp();
            if($str == $dateshare){

                $time =  $item->created_at->format('H:i:s');
            }else{
                $time = date('d M y', strtotime($item->created_at));
            }
            $data = [
                'id_user' => $item->id_user,
                'id_send' => $item->id_send,
                'statut' => $item->statut,
                'to' => $item->to,
                'name_voyant' => $item->name_voyant,
                'message' => $item->message,
                'timestamp' => $timestamp,
                'created_at' => $time,
            ];
            return $data;
        });
        $message = [];
        foreach($message as $key => $value){
            $message[] = $value;
        };
        usort($message, function($a, $b) {
            return $a['timestamp'] <=> $b['timestamp'];
        });
        $user = User::where('id',$id)->first();
        $voyants = CounvClient::where('id_user',$id)->where('statut',0)->get()
        ->map(function ($item, $key)use ($id) {
            $message1 = message::where('id_user',$id)->where('name_voyant',$item->name_voyant)->orderBy('created_at', 'desc')->take(60)->get()->sortBy('created_at')
            ->map(function ($item, $key) {
                $str = date('d/m/y', strtotime(Carbon::now()));
                $dateshare = date('d/m/y', strtotime($item->created_at));
                $dateTime = new DateTime($item->created_at);
                $timestamp = $dateTime->getTimestamp();
                if($str == $dateshare){

                    $time =  $item->created_at->format('H:i:s');
                }else{
                    $time = date('d M y', strtotime($item->created_at));
                }
                $data = [
                    'id_user' => $item->id_user,
                    'id_send' => $item->id_send,
                    'statut' => $item->statut,
                    'to' => $item->to,
                    'name_voyant' => $item->name_voyant,
                    'message' => $item->message,
                    'timestamp' => $timestamp,
                    'created_at' => $time,
                ];
                return $data;
            });
            $message = [];
            foreach($message1 as $key => $value){
                $message[] = $value;
            };
            usort($message, function($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            return [$item->name_voyant => $message];
        });
        $fVoyant = [];
        foreach ($voyants as $vy){
            foreach($vy as $key => $value)
            $fVoyant[$key] =  $value;
        };
        $note = Note_client::where('id_user',$id)->get();
        $yes = message::where('id_user',$id)->orderBy('created_at', 'desc')->first();
        $Active = $yes->name_voyant;
        return response()->json(['message'=>$message,'user'=>$user,'voyants'=>$fVoyant,'note'=>$note,'Active'=>$Active]);

    }

    public function getoneMessage($voyant){
        $listVoyante = ["ISABELLE","SUZANNE","JACQUEMIN","SABINE"];
        if (in_array($voyant, $listVoyante)){
            $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant',$voyant)->first();
            if($counv_clients == null){
                $counv_clients = new CounvClient;
                $counv_clients->id_user = Auth::user()->id;
                $counv_clients->name_voyant = $voyant;
                $counv_clients->statut = 1;
                $counv_clients->save();
            }
            $message1 = message::where('id_user',Auth::user()->id)->where('name_voyant',$voyant)->orderBy('created_at', 'desc')->take(60)->get()->sortBy('created_at')
            ->map(function ($item, $key) {
                $str = date('d/m/y', strtotime(Carbon::now()));
                $dateshare = date('d/m/y', strtotime($item->created_at));
                $dateTime = new DateTime($item->created_at);
                $timestamp = $dateTime->getTimestamp();
                if($str == $dateshare){
                    $time =  $item->created_at->format('H:i:s');
                }else{
                    $time = date('d M y', strtotime($item->created_at));
                }
                $data = [
                    'id_user' => $item->id_user,
                    'id_send' => $item->id_send,
                    'statut' => $item->statut,
                    'to' => $item->to,
                    'name_voyant' => $item->name_voyant,
                    'message' => $item->message,
                    'timestamp' => $timestamp,
                    'created_at' => $time,
                ];
                return $data;
            });
            $message = [];
            foreach($message1 as $key => $value){
                $message[] = $value;
            };
            usort($message, function($a, $b) {
                return $a['timestamp'] <=> $b['timestamp'];
            });
            $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
            if($Idc != null){
                if($Idc->id_send != null){

                    $to = $Idc->id_send;
                }else{
                    $to = 0;
                }
            }else{
                $to = 0;
            }
            $user = User::where('id',Auth::user()->id)->first();
            $name_voyant = $voyant;
            return response()->json(['message'=>$message,'user'=>$user,'name_voyant'=>$name_voyant, 'to'=>$to]);
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            return response()->json(['message'=>[],'user'=>$user,'name_voyant'=>"non existant", 'to'=>0]);
        }


    }

    public function getoneMessagesi(Request $request){

        $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant','SUZANNE')->first();
        if($counv_clients == null){
            $counv_clients = new CounvClient;
            $counv_clients->id_user = Auth::user()->id;
            $counv_clients->name_voyant = 'SUZANNE';
            $counv_clients->statut = 1;
            $counv_clients->save();
        }
        $message = message::where('id_user',Auth::user()->id)->where('name_voyant','SUZANNE')->get()
        ->map(function ($item, $key) {
            $str = date('d/m/y', strtotime(Carbon::now()));
            $dateshare = date('d/m/y', strtotime($item->created_at));
            if($str == $dateshare){

                $time =  $item->created_at->format('H:i:s');
            }else{
                $time = date('d M y', strtotime($item->created_at));
            }
            $data = [
                'id_user' => $item->id_user,
                'id_send' => $item->id_send,
                'statut' => $item->statut,
                'to' => $item->to,
                'name_voyant' => $item->name_voyant,
                'message' => $item->message,
                'created_at' => $time,
            ];
            return $data;
        });
        $user = User::where('id',Auth::user()->id)->first();
                $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($Idc != null){
            if($Idc->id_send != null){

                $to = $Idc->id_send;
            }else{
                $to = 0;
            }
        }else{
            $to = 0;
        }
        $name_voyant = 'SUZANNE';
        return response()->json(['message'=>$message,'user'=>$user,'name_voyant'=>$name_voyant,'to'=>$to]);

    }

    public function getoneMessagej(Request $request){

        $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant','JACQUEMIN')->first();
        if($counv_clients == null){
            $counv_clients = new CounvClient;
            $counv_clients->id_user = Auth::user()->id;
            $counv_clients->name_voyant = 'JACQUEMIN';
            $counv_clients->statut = 1;
            $counv_clients->save();
        }

        $message = message::where('id_user',Auth::user()->id)->where('name_voyant','JACQUEMIN')->get()
        ->map(function ($item, $key) {
            $str = date('d/m/y', strtotime(Carbon::now()));
            $dateshare = date('d/m/y', strtotime($item->created_at));
            if($str == $dateshare){

                $time =  $item->created_at->format('H:i:s');
            }else{
                $time = date('d M y', strtotime($item->created_at));
            }
            $data = [
                'id_user' => $item->id_user,
                'id_send' => $item->id_send,
                'statut' => $item->statut,
                'to' => $item->to,
                'name_voyant' => $item->name_voyant,
                'message' => $item->message,
                'created_at' => $time,
            ];
            return $data;
        });
                $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($Idc != null){
            if($Idc->id_send != null){

                $to = $Idc->id_send;
            }else{
                $to = 0;
            }
        }else{
            $to = 0;
        }
        $user = User::where('id',Auth::user()->id)->first();
        $name_voyant = 'JACQUEMIN';
        return response()->json(['message'=>$message,'user'=>$user,'name_voyant'=>$name_voyant, 'to'=>$to]);

    }

    public function getoneMessageb(Request $request){

        $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant','SABINE')->first();
        if($counv_clients == null){
            $counv_clients = new CounvClient;
            $counv_clients->id_user = Auth::user()->id;
            $counv_clients->name_voyant = 'SABINE';
            $counv_clients->statut = 1;
            $counv_clients->save();
        }
        $message = message::where('id_user',Auth::user()->id)->where('name_voyant','SABINE')->get()
        ->map(function ($item, $key) {
            $str = date('d/m/y', strtotime(Carbon::now()));
            $dateshare = date('d/m/y', strtotime($item->created_at));
            if($str == $dateshare){

                $time =  $item->created_at->format('H:i:s');
            }else{
                $time = date('d M y', strtotime($item->created_at));
            }
            $data = [
                'id_user' => $item->id_user,
                'id_send' => $item->id_send,
                'statut' => $item->statut,
                'to' => $item->to,
                'name_voyant' => $item->name_voyant,
                'message' => $item->message,
                'created_at' => $time,
            ];
            return $data;
        });
        $user = User::where('id',Auth::user()->id)->first();
                $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($Idc != null){
            if($Idc->id_send != null){

                $to = $Idc->id_send;
            }else{
                $to = 0;
            }
        }else{
            $to = 0;
        }
        $name_voyant = 'SABINE';
        return response()->json(['message'=>$message,'user'=>$user,'name_voyant'=>$name_voyant,'to'=>$to]);

    }

    public function send(Request $request){
        $CounvClient = CounvClient::where('id_user',$request->id_user)->where('name_voyant',$request->name_voyant)->first();
        $timeMessage = message::where('id_user',$request->id_user)->where('name_voyant',$request->name_voyant)->where('id_send',$request->id_user)->orderBy('created_at', 'desc')->first();
        $this->TimeMessage($timeMessage);
        if($CounvClient->statut == 0){
            $message = new message;
            $message->id_user = $request->id_user;
            $message->id_send = Auth::user()->id;
            $message->to = $request->id_user;
            $message->name_voyant = $request->name_voyant;
            $message->message = $request->text;
            $message->save();
            // $testb = broadcast(new NewMessage($message));
            // dd($testb);
            $this->PushMessage($message);
            User::where('id',$request->id_user)->update(['name_agent' => Auth::user()->name,'statut_m'=>0]);

             CounvClient::where('id_user',$request->id_user)->where('name_voyant',$request->name_voyant)->update(['statut' => 1]);
             $voyants = CounvClient::where('id_user',$request->id_user)->where('statut',0)->get();

             if(count($voyants) > 0){

                    $message = message::where('id_user',$request->id_user)->get()
                    ->map(function ($item, $key) {
                        $str = date('d/m/y', strtotime(Carbon::now()));
                        $dateshare = date('d/m/y', strtotime($item->created_at));
                        if($str == $dateshare){

                            $time =  $item->created_at->format('H:i:s');
                        }else{
                            $time = date('d M y', strtotime($item->created_at));
                        }
                        $data = [
                            'id_user' => $item->id_user,
                            'id_send' => $item->id_send,
                            'statut' => $item->statut,
                            'to' => $item->to,
                            'name_voyant' => $item->name_voyant,
                            'message' => $item->message,
                            'created_at' => $time,
                        ];
                        return $data;
                    });
                    $user = User::where('id',$request->id_user)->first();
                    $note = Note_client::where('id_user',$request->id_user)->get();
                    $yes = message::where('id_user',$request->id_user)->orderBy('created_at', 'desc')->first();
                    $Active = $yes->name_voyant;
                    return response()->json(['message'=>$message,'user'=>$user,'voyants'=>$voyants,'note'=>$note,'Active'=>$Active]);
             }
        }
            $message = 'null';
            $user = 'null';
            $voyants = 'null';
            $note = 'null';
            $yes = 'null';
            $Active = 'null';
            return response()->json(['message'=>$message,'user'=>$user,'voyants'=>$voyants,'note'=>$note,'Active'=>$Active]);

    }

    public function note(Request $request){
        $note = new Note_client;
        $note->id_user = $request->id_user;
        $note->note = $request->note;
        $note->save();

        $note = Note_client::where('id_user',$request->id_user)->get();
        return response()->json(['note'=>$note]);
    }

    public function getnote($id){

        $note = Note_client::where('id_user',$id)->get();
        return response()->json(['note'=>$note]);
    }

    public function senduser(Request $request){
        $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant',$request->name_voyant)->first();
        if(Auth::user()->credit >= 1){
            // if($counv_clients->statut){
            if($counv_clients->statut == 0){

                $v2 = "Vieille patiente qu'ont repond a votre message";
                $message = message::where('id_user',Auth::user()->id)->where('name_voyant',$request->name_voyant)->latest()->first();

                $user = User::where('id',Auth::user()->id)->first();
                $name_voyant = $request->name_voyant;
                $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
                    if($Idc != null){
                        if($Idc->id_send != null){

                            $to = $Idc->id_send;
                        }else{
                            $to = 0;
                        }
                    }else{
                        $to = 0;
                    }
                return response()->json(['message'=>null,'user'=>$user,'name_voyant'=>$name_voyant,'v2'=>$v2,'to'=>$to]);

            }else{
                $message = new message;
                $message->id_user = Auth::user()->id;
                $message->id_send = Auth::user()->id;
                $message->to = $request->to;
                $message->name_voyant = $request->name_voyant;
                $message->message = $request->text;
                $message->save();
                $credit = Auth::user()->credit -1;

                // $testb = broadcast(new NewMessage($message));
                $this->PushMessage($message);
                // dd($testb);

                User::where('id',Auth::user()->id)->update(['credit' => $credit,'statut_m'=> 1,'pub'=> 1]);
                $counv_clients = CounvClient::where('id_user',Auth::user()->id)->where('name_voyant',$request->name_voyant)->update(['statut' => 0]);

                $str = date('d/m/y', strtotime(Carbon::now()));
                $dateshare = date('d/m/y', strtotime($message->created_at));
                if($str == $dateshare){

                    $time =  $message->created_at->format('H:i:s');
                }else{
                    $time = date('d M y', strtotime($message->created_at));
                }
                $data = [
                    'id_user' => $message->id_user,
                    'id_send' => $message->id_send,
                    'statut' => $message->statut,
                    'to' => $message->to,
                    'name_voyant' => $message->name_voyant,
                    'message' => $message->message,
                    'created_at' => $time,
                ];
                $user = User::where('id',Auth::user()->id)->first();
                $name_voyant = $request->name_voyant;
                $to = $request->to;
                return response()->json(['message'=>$data,'user'=>$user,'name_voyant'=>$name_voyant,'to'=>$to]);
            }

        }else{

            $v2 = 'credit insuffisant ';
                $Idc = message::where('id_user',Auth::user()->id)->where('id_send','!=',Auth::user()->id)->orderBy('created_at', 'desc')->first();
                    if($Idc != null){
                        if($Idc->id_send != null){

                            $to = $Idc->id_send;
                        }else{
                            $to = 0;
                        }
                    }else{
                        $to = 0;
                    }
            $message = message::where('id_user',Auth::user()->id)->where('name_voyant',$request->name_voyant)->get()
            ->map(function ($item, $key) {
                $str = date('d/m/y', strtotime(Carbon::now()));
                $dateshare = date('d/m/y', strtotime($item->created_at));
                if($str == $dateshare){

                    $time =  $item->created_at->format('H:i:s');
                }else{
                    $time = date('d M y', strtotime($item->created_at));
                }
                $data = [
                    'id_user' => $item->id_user,
                    'id_send' => $item->id_send,
                    'statut' => $item->statut,
                    'to' => $item->to,
                    'name_voyant' => $item->name_voyant,
                    'message' => $item->message,
                    'created_at' => $time,
                ];
                return $data;
            });
                $user = User::where('id',Auth::user()->id)->first();
                $name_voyant = $request->name_voyant;
                return response()->json(['message'=>$message,'user'=>$user,'name_voyant'=>$name_voyant,'v2'=>$v2,'to'=>$to]);
        }
    }

    public function TimeMessage($timeMessage){

        $newdate = strtotime($timeMessage->created_at);
        $newdateone = strtotime(Date('Y-m-d H:i:s'));
        $hello = abs( $newdateone - $newdate)/120;
        $tag = Liste_tag::where('id_user', Auth::user()->id)->first();
        $tmessage = $tag->tmessage +1;
        $time = $tag->time + $hello;

        Liste_tag::where('id_user',Auth::user()->id)->update(['time' => $time,'tmessage'=>$tmessage]);

    }

    public function PushMessage($message){
        try {
            $options = [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ];

            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );

            // Données à envoyer
            $data['message'] = $message;

            // Envoyer l'événement
            $pusher->trigger('messages'.$message->to, 'NewMessage', $data);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
