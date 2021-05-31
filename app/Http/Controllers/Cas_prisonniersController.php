<?php

namespace App\Http\Controllers;
use App\Category;
use App\Personnel;
use App\Fonction;
use App\Occupation;
use App\Prisonnier;
use App\Cas_prisonnier;
use App\Prisonnier_prison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cas_prisonniersController extends Controller
{
    public function index()
    {  
        $prisonniers = Prisonnier::all();
        $personnels = Personnel::all();
        $fonctions = Fonction::all();
        $prisonnier_prisons = Prisonnier_prison::all();
        $occupations = Occupation::all();
        $categories = Category::all();
        $cas_prisonniers = DB::table('cas_prisonniers')
            ->select(DB::raw('cas_prisonniers.*,categories.nom_cat_cas, prisonniers.nom_prisonnier, prisonnier_prisons.etat,personnels.nom_personnel,fonctions.nom_fonction,occupations.code_occupation')) 
            ->join('prisonnier_prisons', 'cas_prisonniers.prisonnier_prison_id', '=', 'prisonnier_prisons.id')
            ->join('prisonniers', 'prisonnier_prisons.prisonnier_id', '=', 'prisonniers.id')
            ->join('occupations', 'cas_prisonniers.occupation_id', '=', 'occupations.id')
            ->join('personnels', 'occupations.personnel_id', '=', 'personnels.id')
            ->join('fonctions', 'occupations.fonction_id', '=', 'fonctions.id')
            ->join('categories', 'cas_prisonniers.category_id', '=', 'categories.id')
            ->get();
       $prisonniers=DB::table('prisonnier_prisons')
                ->join('prisonniers', 'prisonnier_prisons.prisonnier_id', '=', 'prisonniers.id')
                ->select('prisonniers.*','prisonnier_prisons.*')
                ->where('prisonnier_prisons.id')
                ->get();
       $personnels =  DB::table('occupations')
                    ->join('personnels', 'occupations.personnel_id', '=', 'personnels.id')
                    ->join('fonctions', 'occupations.fonction_id', '=', 'fonctions.id')
                    ->select( 'personnels.*','fonctions.*','occupations.*')
                    ->where('occupations.id')
                     ->get();
        return view('cas_prisonniers/index',[
            'cas_prisonniers' => $cas_prisonniers,
            'categories' => $categories,
            'prisonnier_prisons'=>$prisonnier_prisons,
            'occupations'=>$occupations,
            'personnels'=>$personnels,
            'prisonniers'=>$prisonniers,
            'fonctions'=>$fonctions,
        ]);
    }

    
    public function create()
    {
        //
        $prisonniers = Prisonnier::all();
        $personnels = Personnel::all();
        $fonctions = Fonction::all();
        $categories = Category::all();
        $prisonnier_prisons = Prisonnier_prison::all();
        $occupations = Occupation::all();
        
        return view('cas_prisonniers/create',[
           'categories' => $categories,
           'prisonnier_prisons'=>$prisonnier_prisons,
           'occupations'=>$occupations,
           'personnels'=>$personnels,
            'prisonniers'=>$prisonniers,
            'fonctions'=>$fonctions,
        ]);
    }

    
     
    public function store(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'prisonnier_prison_id' => 'required',
            'occupation_id' => 'required',
            'lieu_passation' => 'required',
            'date_cas' => 'required',
            'heure_cas' => 'required', 
            'raison_cas' => 'required',
            'nbr_temoins' => 'required'
        ]);

        $cas_prisonnier= new Cas_prisonnier();
        $cas_prisonnier->category_id = $request->category_id;
        $cas_prisonnier->prisonnier_prison_id = $request->prisonnier_prison_id;
        $cas_prisonnier->occupation_id = $request->occupation_id;
        $cas_prisonnier->lieu_passation= $request->lieu_passation;
        $cas_prisonnier->date_cas= $request->date_cas;
        $cas_prisonnier->heure_cas= $request->heure_cas;
        $cas_prisonnier->raison_cas= $request->raison_cas;
        $cas_prisonnier->nbr_temoins= $request->nbr_temoins;
        $cas_prisonnier->save();

        return redirect('cas_prisonniers');
    }

    
    

    // public function show1($id)
    // {
    //     $product_detailleachats = Product::with('detailleachats')
    //     ->GroupBy('$id')->sum('quantite');
    // }
    public function edit(Cas_prisonnier $cas_prisonnier)
    {
        $prisonniers = Prisonnier::all();
        $personnels = Personnel::all();
        $fonctions = Fonction::all();
        $categories = Category::all();
        $prisonnier_prisons = Prisonnier_prison::all();
        $occupations = Occupation::all();
        $cas_prisonnier= Cas_prisonnier::find($cas_prisonnier->id);
        return view('cas_prisonniers/edit',[
            'cas_prisonnier' => $cas_prisonnier,
            'categories' => $categories,
            'prisonnier_prisons'=>$prisonnier_prisons,
            'occupations'=>$occupations,
            'personnels'=>$personnels,
            'prisonniers'=>$prisonniers,
            'fonctions'=>$fonctions,
        ]);
    }

    
    public function update(Request $request, Cas_prisonnier $cas_prisonnier)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'prisonnier_prison_id' => 'required',
            'occupation_id' => 'required',
            'lieu_passation' => 'required',
            'date_cas' => 'required',
            'heure_cas' => 'required', 
            'raison_cas' => 'required',
            'nbr_temoins' => 'required'
        ]);

        $cas_prisonnier->category_id = $request->category_id;
        $cas_prisonnier->prisonnier_prison_id = $request->prisonnier_prison_id;
        $cas_prisonnier->occupation_id = $request->occupation_id;
        $cas_prisonnier->lieu_passation= $request->lieu_passation;
        $cas_prisonnier->date_cas= $request->date_cas;
        $cas_prisonnier->heure_cas= $request->heure_cas;
        $cas_prisonnier->raison_cas= $request->raison_cas;
        $cas_prisonnier->nbr_temoins= $request->nbr_temoins;
        $cas_prisonnier->save();

        return redirect('cas_prisonniers');
    }

    
    public function destroy(Cas_prisonnier $cas_prisonnier)
    {
        
        $cas_prisonnier = Cas_prisonnier::find($cas_prisonnier->id);
        $cas_prisonnier->delete();

        return redirect('cas_prisonniers');
    }
}
