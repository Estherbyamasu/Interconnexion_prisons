<?php

namespace App\Http\Controllers;
use App\Colline;
use App\Commune;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollinesController extends Controller
{     public $commune_id;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $communes = DB::table('communes')
        ->join('provinces','communes.province_id','provinces.id')
        ->select('provinces.*','communes.*')
        ->get();

        $collines = DB::table('collines')
            ->select(DB::raw('collines.*, communes.nom_commune, provinces.nom_province')) 
            ->join('communes', 'collines.commune_id', 'communes.id')
            ->join('provinces', 'communes.province_id', 'provinces.id')
            // ->select('collines','provinces.*','communes.*')
           ->get();
 
        $provinces = DB::table('communes')
            ->join('provinces', 'communes.province_id', 'provinces.id')
            ->select('provinces.*','communes.*')
            ->where('communes.id', $this->commune_id)
            ->get();
            return view('collines/index',[
                'collines' => $collines,
                'communes' => $communes,
                'provinces' => $provinces,
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
        return view('collines/create',[
           
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
            'commune_id' => 'required',
            'nom_colline' => 'required',
            'superficie' => 'required',
            'etat' => 'required'
        ]);

        $colline = new Colline();
        $colline->commune_id = $request->commune_id;
        $colline->nom_colline = $request->nom_colline;
        $colline->superficie = $request->superficie;
        $colline->etat = $request->etat;
        $colline->save();

        // if($this->etat == 1){
           
        // }


        return redirect('collines');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colline  $colline
     * @return \Illuminate\Http\Response
     */
    public function show(Colline $colline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colline  $colline
     * @return \Illuminate\Http\Response
     */
    public function edit(Colline $colline)
    {
        $provinces = Province::all();
        $communes = DB::table('communes')
        ->join('provinces','communes.province_id','provinces.id')
        ->select('provinces.*','communes.*')
        ->get();
        //         $colline = Colline::with('commune.province')->find($id)
        //         $provinces = Province::all();

        //   return view('collines/edit', compact('colline', 'provinces'));

        $colline= Colline::find($colline->id);
        return view('collines/edit', [
         'colline'=>$colline,
            'communes'=>$communes,
            'provinces'=>$provinces
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colline  $colline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        // $this->validate($request, [
        //                 'nom_colline' => 'required|max:255'
        //             ]);
        //      
        //             $author = Author::find($id);
        //             $author->name = $request->name;
        //             $author->city_id = $request->city;
        //             $author->save();
        //      
        //             
        //             return redirect(route('collines.edit', $id))->with('success', 'L\'auteur a bien été mis à jour !');
            
        $request->validate([
            'commune_id' =>'required',
           
            'nom_colline' =>'required',
            'superficie' =>'required',
            'etat' =>'required'
            
           
        ]);
        $colline= new Colline( $id);
        $colline->commune_id= $request->commune_id;
        $colline->nom_colline= $request->nom_colline;
        $colline->superficie= $request->superficie;
        $colline->etat= $request->etat;
        
        $colline->save();
        return redirect('collines', $id)->with('success', 'L\'colline a bien été mis à jour !');



    }

    //     public function communes($id)
    //     {
    //          
    //         return Commune::whereProvinceId($id)->get();
    //       
    // }}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colline  $colline
     * @return \Illuminate\Http\Response
     */

    public function communes($id)
    {
        return Commune::whereProvinceId($id)->get();
    }
    public function destroy(Colline $colline)
    {
        //
    }
}
