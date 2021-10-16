<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use App\Models\Liste_tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
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
    public function voyants()
    {
        if(Auth::user()->statut == 2){

            $liste_voyants = User::where('statut',1)->orderBy('created_at', 'desc')->get();
            $tag = Liste_tag::orderBy('created_at', 'desc')->get();
             return view('Admin.voyants')->with(['liste_voyants'=> $liste_voyants,'tag'=>$tag]);
        }else { return view('acces'); }
    }

    /**
     * Show the form for creating a new resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_post(Request $request)
    {

             $filenameWithExt = $request->image->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension =$request->image->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Uplaod image
            $path= $request->image->storeAs('public/blog',$filenameToStore);



            $filenameWithExti = $request->icone->getClientOriginalName();

            // Get just the filename
            $filenamei = pathinfo($filenameWithExti, PATHINFO_FILENAME);

            // Get extension
            $extensioni =$request->icone->getClientOriginalExtension();

            // Create new filename
            $filenameToStorei = $filenamei.'_'.time().'.'.$extensioni;

            // Uplaod icone
            $path= $request->icone->storeAs('public/blog',$filenameToStorei);
                $poste = new blog();
                $poste->title = $request->titre;
                $poste->description = $request->desc;
                $poste->image = $filenameToStore;
                $poste->profil = $filenameToStorei;
                $poste->save();
                $v2="poste enregistré ";
        return redirect()->route('add_post',['v2'=>$v2]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $liste_tag = new Liste_tag;
        $liste_tag->name_tag = $request->name;
        $liste_tag->save();
        $v2 = 'Le tag a bien étè créer. nom l\'utilisateur : ' .$request->name;

            return redirect()->route('add_voyants', ['v2' => $v2]);
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
