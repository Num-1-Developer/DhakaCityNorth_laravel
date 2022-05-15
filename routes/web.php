<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parlamentController;
use App\Http\Controllers\PS_controler;
use App\Http\Controllers\w_controler;

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
    return view('index');
});
Route::get('/add_parlament_info', [parlamentController::class,'show']);
Route::get('/insert_parlament', [parlamentController::class,'insert']);
Route::get('/parlament_update_page/{id}', [parlamentController::class,'update_page']);
Route::get('/update_parlament/{id}', [parlamentController::class,'update']);
Route::get('/delete_parlament/{id}', [parlamentController::class,'delete']);

Route::get('/Add_Police_Station', [PS_controler::class,'show']);
Route::get('/insert_ps', [PS_controler::class,'insert']);
Route::get('/ps_update_page/{id}', [PS_controler::class,'update_page']);
// Route::get('/update_parlament/{id}', [PS_controler::class,'update']);
// Route::get('/delete_parlament/{id}', [PS_controler::class,'delete']);

Route::get('/add_word_info', [w_controler::class,'show']);
Route::get('/w_ajax/{id}', [w_controler::class,'ajax']);