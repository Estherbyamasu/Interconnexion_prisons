<?php

namespace App\Http\Controllers;
use App\Commune;
use App\Province;
use Illuminate\Http\Request;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provinces/index',
        ['provinces'=>$provinces]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('provinces/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom_province' =>'required',
            'Superficie' =>'required',
            'chef_lieu' =>'required',
        ]);
        $province= new Province();
        $province->nom_province= $request->nom_province;
        $province->Superficie= $request->Superficie;
        $province->chef_lieu= $request->chef_lieu;
        $province->save();
        return redirect('provinces');
    
    }

    public function storecommune(Request $request){ 
        $request->validate([
            'province_id' =>'required',
            
            'nom_commune' =>'required',
            'superficie' =>'required',
           
            
    
        ]);
        $commune= new Commune();
        $commune->province_id= $request->province_id;
       
        $commune->nom_commune= $request->nom_commune;
        $commune->superficie= $request->superficie;
     
        $commune->save();
        return $this->show($request->province_id);
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
            $province_commune = Province::with(['communes'])->find($id);
            return view('provinces.show',compact('province_communes'));
        }
    
      
    
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit(Province $province)
        {
            //
            $province= Province::find($province->id);
        return view('provinces/edit', [
            'province'=>$province
        ]);
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Province $province)
        {
            //
            $province->nom_province= $request->nom_province;
            $province->Superficie= $request->Superficie;
            $province->chef_lieu= $request->chef_lieu;
            $province->save();
        
            return redirect('provinces');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
      
    public function destroy(Province $province)
    {
        $province= Province::find($province->id);

        $province->delete();
       return redirect('provinces');
    }
}
