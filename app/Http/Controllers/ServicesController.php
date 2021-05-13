<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->nom_service = $request->nom_service;
        $service->save();
        return redirect('services');
    }
    public function show($id)
    {
        $service_fonctions = Service::with(['fonctions'])->find($id);
        return view('services.show',compact('service_fonctions'));
    }
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
        $service = Service::find($id);
        $service->nom_service = $request->get('nom_service');
        $service->save();
        return redirect('services');
    }
    public function edit(Service $service)
    {
        
        $service = Service::find($service->id);
        return view('services/edit', ['service' => $service]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guichet  $guichet
     * @return \Illuminate\Http\Response
     */

   
    public function destroy($id)
    {
    $service = Service::find($id);
    $service->delete();
    return redirect('services')->with("success", "Le service est supprimé !");
}

}
