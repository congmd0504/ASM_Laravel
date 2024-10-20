<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $products = Product::with('category')->paginate(8);
        return view('client.home.home',compact('products'));
    }
    public function shop(Request $request,$id = null){
        
        if($request->name){
            $products = Product::with('category')->where('name','LIKE','%'.$request->name.'%')->paginate(9);
        } elseif($id){
            $products = Product::with('category')->where('category_id',$id)->paginate(5);
        }else {
            $products = Product::with('category')->paginate(9);
        }

        // dd($products);
        return view('client.home.shop',compact('products'));
    }
    public function shopDetail($id){
        $product = Product::with('category')->find($id);
        $product->increment('view');
        $comments = Comment::with('product','user')->where('product_id',$id)->get();
        // dd($product);
        return view('client.home.product-detail',compact('product','comments'));
    }
}
