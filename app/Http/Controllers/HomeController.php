<?php

namespace App\Http\Controllers;

use App\Prison;
use App\Province;
use App\Prisonnier_prison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $provinces = Province::all();
        $data = [];
        $total_prisonier = DB::table('prisonnier_prisons')->count();
        foreach ($provinces as  $province) {
            $prison_prisonier = DB::table('prisons')
                        ->join('prisonnier_prisons', 'prisonnier_prisons.prison_id', 'prisons.id')
                        ->join('prisonniers', 'prisonniers.id', 'prisonnier_prisons.prisonnier_id')
                        ->join('collines', 'collines.id', 'prisons.colline_id')
                        ->join('communes', 'communes.id', 'collines.commune_id')
                        ->where('province_id', $province->id)
                        //->select(DB::raw('count(prisonnier_prisons) as nbre_prisonier'))
                        ->count();
            $pourcentage = $prison_prisonier * 100;
            if($total_prisonier > 0)
            {
                $pourcentage = $pourcentage / $total_prisonier;
            }
            $data [] = [
                'province' => $province->nom_province,
                'pourcentage' => $pourcentage,
                'valeur' => $prison_prisonier,
            ];
        }
        return view('home.index', ['charts' => $data, 'max' => $total_prisonier, 'moyenne' => $total_prisonier]);
    }
}
