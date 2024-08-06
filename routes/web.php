<?php

use App\Http\Controllers\MainController;
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

Route::get('/',[MainController::class,'index']);
Route::get('/menu',[MainController::class,'menu']);
Route::get('/riwayat',[MainController::class,'riwayat']);
Route::get('/register',[MainController::class,'register']);
Route::get('/logout',[MainController::class,'logout']);
Route::get('/deletePesanan/{nomor_antrian}',[MainController::class,'deletePesanan']);
Route::get('/deleteMenu/{id_menu}',[MainController::class,'deleteMenu']);

Route::post('/register',[MainController::class,'registration']);
Route::post('/login',[MainController::class,'login']);
Route::post('/menu',[MainController::class,'createMenu']);
Route::post('/edit',[MainController::class,'editMenu']);

