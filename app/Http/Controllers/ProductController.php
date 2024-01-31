<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function list_products(){
        $categories= Category::all();
        $produits= DB::select('select products.*, categories.name as category_name from products JOIN categories on products.id_categorie = categories.id');
        return view('product.product', ['produits' => $produits, 'categories' =>$categories]);
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $produit = new Product();
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName; 
        $produit->save();

        return redirect('/products');
    }

    
    public function edit_product($id){
        $category = category::find($id);
        $product = Product::find($id);
        // dump($product);
        // die();
        $categories= Category::all();
        return view('product.editproduct',compact('categories', 'product'));
    }

    public function update_product(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'img/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $produit = Product::find($request->id);
        $produit->name = $request->name;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName; 
        $produit->update();

        return redirect('/products');

    }
}