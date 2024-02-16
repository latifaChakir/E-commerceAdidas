<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    //
    public function list_products(){
        $categories= Category::all();
        $produits = DB::table('products')
        ->join('categories', 'products.id_categorie', '=', 'categories.id')
        ->select('products.*', 'categories.name as category_name')
        ->simplePaginate(4);
        return view('product.product', ['produits' => $produits, 'categories' =>$categories]);
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'quantity' => 'required',
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
        $produit->quantity = $request->quantity;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName; 
        $produit->save();

        return redirect('/products');
    }

    
    public function edit_product($id){
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
            'quantity' => 'required',
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
        $produit->quantity = $request->quantity;
        $produit->id_categorie = $request->category_id;
        $produit->tags = $request->tags;
        $produit->image_path = $uploadFileName; 
        $produit->update();

        return redirect('/products');

    }

        public function delete_product($id){
        $produit = Product::find($id);
        $produit->delete();
        return redirect('/products');

    }

    public function allproducts(){
        $userRole = session('user_role');
        $permissions= DB::table('permessions')
        ->join('role_permissions', 'permessions.id', '=', 'role_permissions.id_permissions')
        ->join('roles', 'role_permissions.id_role', '=', 'roles.id')
        ->where('roles.id', $userRole)
            ->pluck('permessions.permessions_name')
            ->toArray();
        $allowedPermissions = ['products', 'users','clients', 'categories','roles']; 
        $hasPermission = [];

        foreach ($allowedPermissions as $permission) {
            $hasPermission[$permission] = in_array($permission, $permissions);
        }
        $products = Product::all();
       View::composer(['index', 'layout'], function ($view) use ($hasPermission) {
        $view->with('hasPermission', $hasPermission);
    });
        $categories=Category::all();
         return view('index',compact('products','categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $products = Product::where('name', 'like', "%{$searchTerm}%")->get();
        return view('search', compact('products'));
    }

    public function filter(Request $request)
    {
        $selectedCategory = $request->input('category');

        if ($selectedCategory) {
            $products = Product::where('id_categorie', $selectedCategory)->get();
        } else {
            $products = Product::all();
        }

        return view('filter', compact('products'));
    }

    }

