<?php

namespace App\Http\Controllers;

use App\Prisonnier;
use Illuminate\Http\Request;

class PrisonniersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prisonniers = Prisonnier::all();
        return view('prisonniers.index', compact('prisonniers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prisonniers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prisonnier = new Prisonnier();
        $prisonnier->nom_prisonnier = $request->nom_prisonnier;
        $prisonnier->prenom_prisonnier = $request->prenom_prisonnier;
        $prisonnier->adresse = $request->adresse;
        $prisonnier->save();
        return redirect('prisonniers');
    }
    // public function show($id)
    // {
    //     $prisonnier_caisses = Prisonnier::with(['caisses'])->find($id);
    //     return view('prisonniers.show',compact('prisonnier_caisses'));
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\prisonnier  $prisonnier
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $prisonnier_caisses = Guichet::with(['caisses'])->find($id);
    //     return view('guichets.show',compact('guichet_caisses'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $guichets = Guichet::find($id);
    //     return view('guichets.edit', compact('guichets'));
    // }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prisonnier = Prisonnier::find($id);
        $prisonnier->nom_prisonnier = $request->nom_prisonnier;
        $prisonnier->prenom_prisonnier = $request->prenom_prisonnier;
        $prisonnier->adresse = $request->adresse;
        $prisonnier->save();
        
        return redirect('prisonniers')->with("success", "Le prisonnier est modifié !");
    }
    public function edit(Prisonnier $prisonnier)
    {
        
        $prisonnier = Prisonnier::find($prisonnier->id);
        return view('prisonniers/edit', ['prisonnier' => $prisonnier]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
    $prisonnier = Prisonnier::find($id);
    $prisonnier->delete();
    return redirect('prisonniers')->with("success", "Le prisonnier est supprimé !");
}

}
