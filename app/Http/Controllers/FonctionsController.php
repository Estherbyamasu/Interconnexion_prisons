<?php

namespace App\Http\Controllers;
use App\Service;
use App\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class FonctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        $fonctions = DB::table('services')
            ->join('fonctions', 'fonctions.service_id', '=', 'services.id')
            ->get();
        return view('fonctions/index',[
            'fonctions' => $fonctions,
            'services' => $services
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('fonctions/create',[
           'services' => $services
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'nom_fonction' => 'required',
           
        ]);

        $fonction = new Fonction();
        $fonction->service_id = $request->service_id;
        $fonction->nom_fonction = $request->nom_fonction;
      
        $fonction->save();

        return redirect('fonctions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Fonction $fonction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonction $fonction)
    {
        $services = Service::all();
        $fonction = Fonction::find($fonction->id);
        return view('fonctions/edit',[
            'fonction' => $fonction,
            'services' => $services
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonction $fonction)
    {
        $request->validate([
            'service_id' => 'required',
            'nom_fonction' => 'required',
            
        ]);

        $fonction = new Fonction();
        $fonction->guichet_id = $request->guichet_id;
        $fonction->nom_fonction = $request->nom_fonction;
        
        $fonction->save();

        return redirect('fonctions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonction $fonction)
    {
        $fonction = Fonction::find($fonction->id);
        $fonction->delete();

        return redirect('fonctions');
    }
}
