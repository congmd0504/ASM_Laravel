<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->latest('id')->paginate(5);
        // dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'weight' => $request->weight,
            'quality' => $request->quality,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->file('image'));
        }
        Product::query()->create($data);
        return redirect()->route('products.create')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view('admin.products.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'weight' => $request->weight,
            'quality' => $request->quality,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id
        ];
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('products', $request->file('image'));
            Storage::delete($product->image);
        }
        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhập thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa thành công !');
    }
}
