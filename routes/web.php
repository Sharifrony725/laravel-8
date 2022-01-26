<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [ContactController::class, 'about'])->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('dashboard' , compact('users'));
})->name('dashboard');

//category controller
Route::get('/all-category', [CategoryController::class ,'index'])->name('all-category');
Route::get('/add-category', [CategoryController::class ,'create'])->name('add-category');
Route::post('/store-category', [CategoryController::class ,'store'])->name('store-category');
Route::get('category/edit/{id}', [CategoryController::class ,'edit']);
Route::get('category/delete/{id}', [CategoryController::class ,'softDelete']);
Route::get('category/permanetDelete/{id}', [CategoryController::class ,'destroy']);
Route::get('category/restore/{id}', [CategoryController::class ,'restore']);
Route::post('update-category/{id}', [CategoryController::class ,'update'])->name('update-category');

//brand controller
Route::get('/all-brand', [BrandController::class ,'index'])->name('all-brand');
Route::get('/add-brand', [BrandController::class, 'create'])->name('add-brand');
Route::post('/store-brand' , [BrandController::class, 'store'])->name('store-brand');
Route::get('brand/edit/{id}', [BrandController::class ,'edit']);
Route::post('update-brand/{id}',[BrandController::class, 'update'])->name('update-brand')
