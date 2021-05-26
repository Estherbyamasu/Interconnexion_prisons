<?php

namespace App\Http\Controllers;
use App\Prison;
use App\Personnel;
use App\Fonction;
use App\Service;
use App\Occupation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OccupationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $provinces = Province::all();
        // $communes = DB::table('communes')
        // ->join('provinces','communes.province_id','provinces.id')
        // ->select('provinces.*','communes.*')
        // ->get();

        // $collines = DB::table('collines')
        //     ->select(DB::raw('collines.*, communes.nom_commune, provinces.nom_province')) 
        //     ->join('communes', 'collines.commune_id', 'communes.id')
        //     ->join('provinces', 'communes.province_id', 'provinces.id')
        //     // ->select('collines','provinces.*','communes.*')
        //    ->get();
 
        // $provinces = DB::table('communes')
        //     ->join('provinces', 'communes.province_id', 'provinces.id')
        //     ->select('provinces.*','communes.*')
        //     ->where('communes.id', $this->commune_id)
        //     ->get();
        //     return view('collines/index',[
        //         'collines' => $collines,
        //         'communes' => $communes,
        //         'provinces' => $provinces,
        //     ]); 


          //
          $prisons = Prison::all();
          $personnels = Personnel::all();
          $fonctions = Fonction::all();
          $occupations = DB::table('occupations')
          
              ->join('prisons', 'occupations.prison_id', '=', 'prisons.id')
              ->join('personnels', 'occupations.personnel_id', '=', 'personnels.id')
              ->join('fonctions', 'occupations.fonction_id', '=', 'fonctions.id')
              ->join('services', 'fonctions.service_id', '=', 'services.id')
              ->select('prisons.*', 'personnels.*','fonctions.*','services.*', 'occupations.*')
              ->get();

              $services = DB::table('fonctions')
                        ->join('services', 'fonctions.service_id', 'services.id')
                        ->select('services.*','fonctions.*')
                        // ->where('fonctions.id', $this->fonction_id)
                        ->get();
          return view('occupations/index',[
              'occupations' => $occupations,
              'prisons' => $prisons,
              '$personnels' => $personnels,
              'fonctions' => $fonctions,
              'services' => $services,
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prisons = Prison::all();
        $personnels = Personnel::all();
        $fonctions = Fonction::all();
        $services = Service::all();
        return view('occupations/create',[
            
            'prisons' => $prisons,
            'personnels' => $personnels,
            'fonctions' => $fonctions,
            'services' => $services,
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
            'prison_id' => 'required',
            'personnel_id' => 'required',
            'fonction_id' => 'required',
            'etat' => 'required',
            'code_occupation' => 'required'
        ]);

        $occupation = new Occupation();
        $occupation ->prison_id = $request->prison_id;
        $occupation ->personnel_id = $request->personnel_id;
        $occupation ->fonction_id = $request->fonction_id;
        
        $occupation ->etat = $request->etat;
        $occupation ->code_occupation = $request->code_occupation;
        $occupation ->save();

        return redirect('occupations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function edit(Occupation $occupation)
    {
        $prisons = Prison::all();
        $personnels = Personnel::all();
        $fonctions = Fonction::all();
        $services = Service::all();
        $occupation = Occupation::find($occupation->id);
        return view('occupations/edit',[
            'occupation' => $occupation,
            'prisons' => $prisons,
            'personnels' => $personnels,
            'fonctions' => $fonctions,
            'services' => $services
        ]);


        // $prisons = Prison::all();
        // $personnels = Personnel::all();
        // $fonctions = DB::table('fonctions')
        //             ->join('services','fonctions.service_id','services.id')
        //             ->select('services.*','fonctions.*')
        //             ->get();
        // $services = Service::all();
        
        // $occupation= Occupation::find($occupation->id);
        // return view('occupations/edit', [
        //     'occupation'=>$occupation,
        //     'prisons'=>$prisons,
        //     'personnels '=>$personnels ,
        //     'fonctions '=>$fonctions ,
        //     'services '=>$services ,
        //     ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation $occupation)
    {
        $request->validate([
            'prison_id' => 'required',
            'personnel_id' => 'required',
            'fonction_id' => 'required',
            'etat' => 'required',
            'code_occupation' => 'required'
        ]);

        
        $occupation ->prison_id = $request->prison_id;
        $occupation ->personnel_id = $request->personnel_id;
        $occupation ->fonction_id = $request->fonction_id;
        
        $occupation ->etat = $request->etat;
        $occupation ->code_occupation = $request->code_occupation;
        $occupation ->save();

        return redirect('occupations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        $occupation = Occupation::find($occupation->id);
        $occupation->delete();

        return redirect('occupations');
    }
}
