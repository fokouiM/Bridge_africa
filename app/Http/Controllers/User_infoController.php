<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Liste_tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\blog;

class User_infoController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset(Auth::user()->id)){
            if(Auth::user()->statut == 2){
                return view('Admin.profile');

            }elseif(Auth::user()->statut == 0){
                return view('from.profile');
            }
        }

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
            $date = date('Y-m-d H:i:s');
            $name = $request->name .time();
        $User = new User;
        $User->name = $name;
        $User->email = $name;
        $User->statut = 1;
        $User->email_verified_at = $date;
        $User->password = Hash::make($request->password);
        $User->save();
        $user_in = User::where('email',$name)->first();
        $Liste_tag = new Liste_tag;
        $Liste_tag->id_user = $user_in->name;
        $Liste_tag->time = "00";
        $Liste_tag->save();
        $v2 = 'Agent a bien étè créer. nom l\'utilisateur : ' .$name. ' | mot de passe : '.$request->password;

            return redirect()->route('add_users', ['v2' => $v2]);
    }


    public function save_time(Request $request)
    {
        $id = $request->name;
        $time = (int)$request->time;
        $tag = Liste_tag::where('id_user',$id)->first();
        $new_time = $time  + (int)$tag->time;
            Liste_tag::where('id_user',$id)->update(['time' => $new_time,]);
            // Liste_tag::where('id',$id)->update(['time' => 00,]);

            return redirect()->route('home');
    }


    public function finMoi($id)
    {
            Liste_tag::where('id',$id)->update(['time' => 00,]);

            return redirect()->route('voyants');
    }

    public function deleteAgent($id)
    {       $user = User::where('id',$id)->first();
            Liste_tag::where('id',$user->name)->delete();
            User::where('id',$id)->delete();

            return redirect()->route('voyants');
    }

    public function deleteClient($id)
    {       $user = User::where('id',$id)->first();
            Liste_tag::where('id',$user->name)->delete();
            User::where('id',$id)->delete();

            return redirect()->route('clients');
    }

    public function deletePoste($id)
    {
             blog::where('id',$id)->delete();

            return redirect()->route('clients');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);
        User::findOrFail($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);
        $v2 = 'Vos information on étè mise a jour';

        return redirect()->route('profile', ['v2' => $v2]);
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
