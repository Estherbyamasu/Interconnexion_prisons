<?php

namespace App\Http\Controllers;

use App\Personnel;
use Illuminate\Http\Request;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnels.index', compact('personnels'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personnels.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personnel = new Personnel();
        $personnel->nom_personnel = $request->nom_personnel;
        $personnel->prenom_personnel = $request->prenom_personnel;
        $personnel->genre = $request->genre;
        $personnel->tel = $request->tel;
        $personnel->adresse = $request->adresse;
        $personnel->email = $request->email;
        $personnel->save();
        return redirect('personnels');
    }
    // public function show($id)
    // {
    //     $guichet_caisses = Guichet::with(['caisses'])->find($id);
    //     return view('guichets.show',compact('guichet_caisses'));
    // }
    /**
     * Display the specified resource.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $guichet_caisses = Guichet::with(['caisses'])->find($id);
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
        $personnel = Personnel::find($id);
        $personnel->nom_personnel = $request->nom_personnel;
        $personnel->prenom_personnel = $request->prenom_personnel;
        $personnel->genre = $request->genre;
        $personnel->tel = $request->tel;
        $personnel->adresse = $request->adresse;
        $personnel->email = $request->email;
        $personnel->save();
        return redirect('personnels');
    }
    public function edit(Personnel $personnel)
    {
        
        $personnel = Personnel::find($personnel->id);
        return view('personnels/edit', ['personnel' => $personnel]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
    $personnel = Personnel::find($id);
    $personnel->delete();
    return redirect('personnels')->with("success", "Le personnel est supprimé !");
}

}
