<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StasticController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\UpdateUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Admin
//Category
Route::middleware([CheckAdmin::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [StasticController::class, 'stastic'])->name('stastic');
        Route::get('/statis/product/{id}', [StasticController::class, 'productByCate'])->name('admin.productByCate');
        Route::resource('/categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::get('/user', [AuthController::class, 'listUser'])->name('admin.user');
        Route::put('/user/{user}', [AuthController::class, 'editActive'])->name('admin.editActive')->middleware([UpdateUser::class]);
        Route::get('/user/add', [AuthController::class, 'addUser'])->name('admin.addUser');
        Route::post('/user/add', [AuthController::class, 'postUser'])->name('admin.postUser');
        Route::get('/comment', [CommentController::class, 'listComment'])->name('admin.listComment');
        Route::get('/comment/{id}', [CommentController::class, 'listCommentByProduct'])->name('admin.listCommentByProduct');
        Route::delete('/comment/delete/{id}', [CommentController::class, 'deleteComment'])->name('admin.deleteComment');
    });
});


Route::get('/', [ClientController::class, 'index'])->name('client.index')->middleware([CheckLogin::class]);
Route::prefix('/client')->group(function () {
});

//Auth
Route::get('/login', [AuthController::class, 'getLogin'])->name('getLogin');
Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');

// Route::get('/forgetpass', [AuthController::class, 'forgetPass'])->name('forgetPass');
// Route::post('/forgetpass', [AuthController::class, 'postForgetPass'])->name('postForgetPass');
// // Route hiển thị form đặt lại mật khẩu (nhập mật khẩu mới)
// Route::get('reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset.custom');
// // Route xử lý yêu cầu đặt lại mật khẩu
// Route::post('reset-password/{token}', [AuthController::class, 'reset'])->name('password.update.custom');

Route::get('/regester', [AuthController::class, 'getRegister'])->name('getRegister');
Route::post('/regester', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/update/user/{user}', [AuthController::class, 'edit'])->name('editUser');
Route::put('/update/user/{user}', [AuthController::class, 'update'])->name('updateUser');

//Shop
Route::get('/shop', [ClientController::class, 'shop'])->name('client.shop');
Route::get('/shop/{id}', [ClientController::class, 'shop'])->name('client.shop.id');
Route::post('/shop-key', [ClientController::class, 'shop'])->name('client.shop.name');
Route::get('/shop-detail/{id}', [ClientController::class, 'shopDetail'])->name('client.shopDetail');
Route::get('/contact',function(){
    return view('client.home.contact');
})->name('client.contact');
Route::post('/postComment',[CommentController::class,'postComment'])->name('client.postComment')->middleware([CheckAdmin::class]);


Route::post('/cart',[CartController::class,'cart'])->name('client.cart')->middleware([CheckAdmin::class]);
Route::get('/getCart',[CartController::class,'getCart'])->name('client.getCart')->middleware([CheckAdmin::class]);
Route::delete('/delete/{id}',[CartController::class,'delete'])->name('client.delete');
