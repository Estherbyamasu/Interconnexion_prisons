<?php

namespace App\Http\Controllers;

use App\Categorie_cas;
use Illuminate\Http\Request;

class Categorie_casController extends Controller
{
    public function index()
    {
        $categories = Categorie_cas::all();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }
    public function show($id)
    {
        $category_products = Categorie_cas::with(['products'])->find($id);
        return view('categories.show',compact('category_products'));
    }
    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $category = new Categorie_cas();

        $category->cat_name = $request->cat_name;

        $category->save();
        return redirect('categories');

    }
    public function storeprod(Request $request)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'nom_produit' => 'required',
            'prix' => 'required'
        ]);

        $product = new Cas_prisonnier();
        $product->category_id = $request->category_id;
        $product->nom_produit = $request->nom_produit;
        $product->prix = $request->prix;
        $product->save();
        
        return $this->show($request->category_id);
    }

    public function edit(Categorie_cas $category)
    {
        
        $category = Categorie_cas::find($category->id);
        return view('categories/edit', ['category' => $category]);
    }

    public function update(Request $request,Categorie_cas $category)
    {
        $category->cat_name = $request->cat_name;
        $category->save();
        return redirect('categories');
    }

    public function destroy(Categorie_cas $category)
    {
        $category = Categorie_cas::find($category->id);
        $category->delete();
        return redirect('categories');
    }
}
