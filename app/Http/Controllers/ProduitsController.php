<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poduits;

class ProduitsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('from.add_produits');
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
            $filenameWithExt = $request->file->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Uplaod image
            $path= $request->file->storeAs('public/assets/produits',$filenameToStore);


            $Produit = new Poduits;
            $Produit->name = $request->name;
            $Produit->description = $request->description;
            $Produit->prix = $request->prix;
            $Produit->file = $filenameToStore;
            $Produit->save();
            $v2 = 'your product has been added ';

            return redirect()->route('home', ['v2' => $v2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Produits = Poduits::find($id)->first();
        return view('from.update_produits')->with('Produits', $Produits);
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
        if($request->file === null){

            $Produit = Poduits::find($id);
            $Produit->name = $request->name;
            $Produit->description = $request->description;
            $Produit->prix = $request->prix;
            $Produit->save();

            $v2 = 'update of the validated produit';
            return redirect()->route('home', ['v2' => $v2]);

        }else{
            $filenameWithExt = $request->file->getClientOriginalName();

            // Get just the filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Get extension
            $extension = $request->file->getClientOriginalExtension();

            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Uplaod image
            $path= $request->file->storeAs('public/assets/produits',$filenameToStore);


            $Produit = Poduits::find($id);
            $Produit->name = $request->name;
            $Produit->description = $request->description;
            $Produit->prix = $request->prix;
            $Produit->file = $filenameToStore;
            $Produit->save();;
            $v2 = 'update of the validated produit ';

            return redirect()->route('home', ['v2' => $v2]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Poduits::where('id', $id)->delete();
        return redirect()->back();
    }
}
