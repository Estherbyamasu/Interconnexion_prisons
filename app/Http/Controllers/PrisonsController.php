<?php

namespace App\Http\Controllers;
use App\Prison;
use App\Colline;
use App\Commune;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrisonsController extends Controller
{
    public $colline_id,$commune_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $communes = Commune::all();
        // $communes = DB::table('communes')
        // ->join('provinces','communes.province_id','provinces.id')
        // ->select('provinces.*','communes.*')
        // ->get();
       $prisons=DB::table('prisons')
                ->join('collines', 'prisons.colline_id', 'collines.id')
                // ->join('communes', 'prisons.commune_id', 'communes.id')
                // ->join('provinces', 'prisons.province_id', 'provinces.id')
                ->get();
        $collines = DB::table('collines')
            ->join('communes', 'collines.commune_id', 'communes.id')
            ->join('provinces', 'communes.province_id', 'provinces.id')
            ->get();
 
        $provinces = DB::table('communes')
            ->join('provinces', 'communes.province_id', 'provinces.id')
            ->select('provinces.*','communes.*')
            ->where('communes.id', $this->commune_id)
            ->get();
         $communes = DB::table('collines')
                ->join('communes','collines.commune_id','communes.id')
                ->select('communes.*','collines.*')
                ->where('collines.id', $this->colline_id)
                ->get();
            return view('prisons/index',[
                'collines' => $collines,
                'communes' => $communes,
                'provinces' => $provinces,
                'prisons' => $prisons,
            ]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $communes = Commune::all();
        $collines = Colline::all();
        return view('prisons/create',[
            'collines' => $collines,
            'communes' => $communes,
            'provinces' => $provinces,
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
            'colline_id' => 'required',
            'type_prison' => 'required',
            'nbre_piece' => 'required',
            'adresse_complete' => 'required',
            'fax' => 'required',
            'code_prison' => 'required',
        ]);

        $prison = new Prison();
        $prison->colline_id = $request->colline_id;
        $prison->type_prison = $request->type_prison;
        $prison->nbre_piece = $request->nbre_piece;
        $prison->adresse_complete = $request->adresse_complete;
        $prison->fax = $request->fax;
        $prison->code_prison= $request->code_prison;
        $prison->save();

        // if($this->etat == 1){
           
        // }


        return redirect('prisons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prison  $prison
     * @return \Illuminate\Http\Response
     */
    public function show(Prison $prison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prison  $prison
     * @return \Illuminate\Http\Response
     */
    public function edit(Prison $prison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prison  $prison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prison $prison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prison  $prison
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prison $prison)
    {
        //
    }
}
