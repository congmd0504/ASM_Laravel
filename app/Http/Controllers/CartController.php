<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCart()
    {
        $listCart = Cart::with('user','product')->where('user_id',Auth::id())->get();
        $tongdon = 0;
        // dd($listCart);
        return view('client.home.cart',compact('listCart','tongdon'));
    }
    public function cart(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        Cart::query()->create($data);
        return redirect()->route('client.getCart')->with('success', 'Thêm giỏ hàng thành công!');
    }
    public function delete($id){
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->route('client.getCart')->with('success', 'Xóa thành công!');
    }
}
