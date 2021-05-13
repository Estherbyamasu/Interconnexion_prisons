<?php

Namespace App\Http\Controllers;
use App\Commune;
use App\Province;


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\DB;
 
class CommunesController extends Controller{

public function index()
{
    # code... 
    $provinces= Province::all();


    $communes = DB::table('communes')
                 ->join('provinces','communes.province_id','provinces.id')
                
                 ->select('provinces.*','communes.*')
                 ->get();
    // $communes = DB::table('communes')
    //              ->join('provinces','communes.province_id','provinces.id')
    //              ->select('provinces.*','communes.*')
    //              ->get();
    return view('communes/index',
    ['communes'=>$communes,
    'provinces'=>$provinces
    ]);

}

public function create()

{
 $provinces = Province::all();
 # code...
    return view('communes/create',
   ['provinces'=>$provinces]);
   
}

public function store(Request $request)
{
    # code...
    //validation

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
    return redirect('communes');

}

public function show($id)
{
    //
    $communes = Commune::all();
    return view('communes/show',['communes'=>$communes]);
}



//dependency injection
public function edit(Commune $commune)
{
    # code...
    $provinces= Province::all();
    $commune= Commune::find($commune->id);
    return view('communes/edit', [
     'commune'=>$commune,
        'provinces'=>$provinces,
    ]);
}

public function update(Request $request, Commune $commune)

{
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
    return redirect('communes');
  
}

public function destroy(Commune $commune)
{
    # code...

    $commune= Commune::find($commune->id);
  $commune->delete();
  return redirect('communes');
}


}