<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Home;
use App\Http\Livewire\Keranjang;
use Illuminate\Support\Facades\Route;

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

Route::get('/shop', [PagesController::class, 'index']);
Route::get('/catalog', [PagesController::class, 'catalog']);

Route::get('/',  [PagesController::class, 'about']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/verified_login', [AuthController::class, 'verified_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/listproduct', ProductController::class);
    Route::resource('/listcatalog', CatalogController::class);
    Route::resource('/listuser', UserController::class);
});
