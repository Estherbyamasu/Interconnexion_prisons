<?php

namespace App\Http\Controllers;
use App\Cas_prisonnier;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories/index', [
            'categories' => $categories
        ]);
    }
    public function show($id)
    {
        $category_cas_prisonniers = Category::with(['cas_prisonniers'])->find($id);
        return view('categories.show',compact('category_cas_prisonniers'));
    }
    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->nom_cat_cas = $request->nom_cat_cas;
        $category->description = $request->description;
        $category->save();
        return redirect('categories');

    }
    // public function storeprod(Request $request)
    // {
    //     //
    //     $request->validate([
    //         'category_id' => 'required',
    //         'nom_produit' => 'required',
    //         'prix' => 'required'
    //     ]);

    //     $cas_prisonnier = new Cas_prisonnier();
    //     $cas_prisonnier->category_id = $request->category_id;
    //     $cas_prisonnier->nom_produit = $request->nom_produit;
    //     $cas_prisonnier->prix = $request->prix;
    //     $cas_prisonnier->save();
        
    //     return $this->show($request->category_id);
    // }

    public function edit(Category $category)
    {
        
        $category = Category::find($category->id);
        return view('categories/edit', ['category' => $category]);
    }

    public function update(Request $request,Category $category)
    {
       
        $category->nom_cat_cas = $request->nom_cat_cas;
        $category->description = $request->description;
        $category->save();
        return redirect('categories');
    }

    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect('categories');
    }
}
