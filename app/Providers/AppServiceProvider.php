<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        view()->composer('*', function ($view) {
            // Lấy dữ liệu từ database
            $categories = Category::all(); 
            $allProduct = Product::with('category')->paginate(6);
            $totalCart = Cart::where('user_id',Auth::id())->count();
            // dd($totalCart);
            // Truyền dữ liệu vào view header
            $view->with(compact('categories','allProduct','totalCart'));
        });
    }
}
