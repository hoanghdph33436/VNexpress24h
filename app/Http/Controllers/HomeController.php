<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $featuredProduct = Product::where('stock', 1)->limit(5)->get();
        // dd($featuredProduct);

        $newProduct = Product::orderBy('created_at','desc')->paginate(5);
        return view("fe.home", compact('featuredProduct', 'newProduct'));
    }

    public function detail($slug){
        $product = Product::where('slug', $slug)->first();
        return view('fe.detail', compact('product'));
    }
    public function result($id){
        $category = Category::where('id', $id)->get();
        $products = Product::where('category_id', $id)->paginate(5);
        return view('fe.result', compact('category', 'products'));
    }
}
