<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\Product as AdminProduct;
use App\Http\Controllers\Web\Product as UserProduct;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/login', [AuthController::class, 'login_page'])->name('auth.login_page');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('auth/login_proces', [AuthController::class, 'login_proces'])->name('auth.login_proces');

Route::get('/', function () {
        return view('index');
});

Route::get('products/{slug}', [UserProduct::class, 'products'])->name('products');

Route::group(['prefix' => 'admin', 'middleware' => ['CheckAuth']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('product', AdminProduct::class);
});
