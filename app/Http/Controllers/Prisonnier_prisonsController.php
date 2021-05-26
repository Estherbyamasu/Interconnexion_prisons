<?php

namespace App\Http\Controllers;
use App\Prison;
use App\Colline;
use App\Prisonnier;
use App\Prisonnier_prison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Prisonnier_prisonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prisonniers = Prisonnier::all();
        $prisons = Prison::all();
        
        $prisonnier_prisons = DB::table('prisonnier_prisons')
            ->join('prisons', 'prisonnier_prisons.prison_id', '=', 'prisons.id')
            ->join('prisonniers', 'prisonnier_prisons.prisonnier_id', '=', 'prisonniers.id')
            ->join('collines', 'prisons.colline_id', 'collines.id')
          
            ->select('prisonniers.*', 'prisons.*','collines.*', 'prisonnier_prisons.*')
            ->get();
         $collines = DB::table('prisons')
            ->join('collines', 'prisons.colline_id', 'collines.id')
            ->select('collines.*','prisons.*')
            // ->where('prisons.id', $this->prison_id)
            ->get();

        return view('prisonnier_prisons/index',[
            'prisonnier_prisons' => $prisonnier_prisons,
            'prisonniers' => $prisonniers,
            'prisons' => $prisons,
           'colline' => $collines
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $prisonniers = Prisonnier::all();
        $prisons = Prison::all();
        $collines =Colline::all();
       
        return view('prisonnier_prisons/create',[
           'prisonniers' => $prisonniers,
            'prisons' => $prisons,
           'colline' => $collines
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
            'prisonnier_id' => 'required',
            'etat' => 'required'
        ]);

        $prisonnier_prison = new Prisonnier_prison();
        $prisonnier_prison->prison_id = $request->prison_id;
        $prisonnier_prison->prisonnier_id = $request->prisonnier_id;
       $prisonnier_prison->etat = $request->etat;
        $prisonnier_prison->save();

        // if($this->etat == 1){
           
        // }


        return redirect('prisonnier_prisons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prisonnier_prison  $prisonnier_prison
     * @return \Illuminate\Http\Response
     */
    public function show(Prisonnier_prison $prisonnier_prison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prisonnier_prison  $prisonnier_prison
     * @return \Illuminate\Http\Response
     */
    public function edit(Prisonnier_prison $prisonnier_prison)
    {
        // $prisonniers = Prisonnier::all();
        // $prisons = Prison::all();
        // $collines = colline::all();
       
        // $prisonnier_prison= Prisonnier_prison::find($prisonnier_prison->id);
        // return view('prisonnier_prisons/edit', [
        //  'prisonniers'=>$prisonniers,
        //     'prisons'=>$prisons,
        //     'collines'=>$collines
        //     ]);

        $prisons = Prison::all();
        $prisonniers = prisonnier::all();
        $collines = colline::all();
        $prisonnier_prison = Prisonnier_prison::find($prisonnier_prison->id);
        return view('prisonnier_prisons/edit',[
            'prisonnier_prison' => $prisonnier_prison,
            'prisonniers' => $prisonniers,
            'prisons' => $prisons,
            'collines' => $collines
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prisonnier_prison  $prisonnier_prison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prisonnier_prison $prisonnier_prison)
    {
        $request->validate([
            'prison_id' => 'required',
            'prisonnier_id' => 'required',
           
            'etat' => 'required'
        ]);

        
        $prisonnier_prison->prison_id = $request->prison_id;
        $prisonnier_prison->prisonnier_id = $request->prisonnier_id;
        
        $prisonnier_prison->etat = $request->etat;
        $prisonnier_prison->save();

       
        return redirect('prisonnier_prisons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prisonnier_prison  $prisonnier_prison
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prisonnier_prison = Prisonnier_prison::find($id);
        $prisonnier_prison->delete();
        return redirect('prisonnier_prisons')->with("success", "Le prisonnier est supprimé !");
    }
}
