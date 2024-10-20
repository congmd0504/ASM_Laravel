<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class StasticController extends Controller
{
    public function stastic(){
        $totalProduct = Product::count();
        $totalUser = User::count();
        $productByCate = Category::withCount('products')->get();
        $productView = Product::query()->orderByDesc('view')->paginate(10);
        $sumView = Product::sum('view');
        $totaLCommnent= Comment::count();
        // dd($productView);
        return view('admin.stastic.index',compact('totalProduct','totalUser','productByCate','productView','sumView','totaLCommnent'));
    }
    public function productByCate($id)
    {
        $products = Product::with('category')->latest('id')->where('category_id',$id)->paginate(5);
        // dd($products);
        return view('admin.stastic.productByCate', compact('products'));
    }
}
