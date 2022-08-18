<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;

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
});

Route::resource('books' , BookController::class)->middleware('auth');

Route::get('book/rent/{book}', [BookController::class,'rent' ])->name('book_rent')->middleware('auth');

Auth::routes(['verify'=>true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');


Route::get('payment',[ PaymentController::class,'index']);
Route::post('charge',[ PaymentController::class,'charge']);
Route::get('success',[ PaymentController::class,'success']);
Route::get('error', [PaymentController::class,'error']);
