<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
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
Route::post('update-category/{id}', [CategoryController::class ,'update'])->name('update-category');