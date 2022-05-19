<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\parlamentController;
use App\Http\Controllers\PS_controler;
use App\Http\Controllers\w_controler;
use App\Http\Controllers\u_controler;
use App\Http\Controllers\designation_controler;
use App\Http\Controllers\mp_controler;
use App\Http\Controllers\secreatry_controler;
use App\Http\Controllers\word_rp_controler;
use App\Http\Controllers\unit_rp_controler;

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
Route::post('/insert_parlament', [parlamentController::class,'insert']);
Route::get('/parlament_update_page/{id}', [parlamentController::class,'update_page']);
Route::get('/update_parlament/{id}', [parlamentController::class,'update']);
Route::get('/delete_parlament/{id}', [parlamentController::class,'delete']);


Route::get('/Add_Police_Station', [PS_controler::class,'show']);
Route::get('/insert_ps', [PS_controler::class,'insert']);
Route::get('/ps_update_page/{id}', [PS_controler::class,'update_page']);
// Route::get('/update_parlament/{id}', [PS_controler::class,'update']);
// Route::get('/delete_parlament/{id}', [PS_controler::class,'delete']);

Route::get('/add_word_info', [w_controler::class,'show']);
Route::get('insert_word_info', [w_controler::class,'insert']);

Route::get('/add_unit_info', [u_controler::class,'show']);
Route::get('insert_unit_info', [u_controler::class,'insert']);


Route::get('/ps_ajax/{id}', [w_controler::class,'ajax']);
Route::get('/w_ajax/{id}', [u_controler::class,'ajax']);
Route::get('/u_ajax/{id}', [unit_rp_controler::class,'ajax']);


Route::get('/show_designation_info', [designation_controler::class,'show']);
Route::post('insert_designation_info', [designation_controler::class,'insert']);

Route::get('/show_mp_info', [mp_controler::class,'show']);
Route::post('/insert_mp_info', [mp_controler::class,'insert']);

Route::get('/show_thana_rs_info', [secreatry_controler::class,'show']);
Route::post('/insert_thana_rs_info', [secreatry_controler::class,'insert']);

Route::get('/show_word_rp_info', [word_rp_controler::class,'show']);
Route::post('/insert_word_rp_info', [word_rp_controler::class,'insert']);

Route::get('/show_unit_rp_info', [unit_rp_controler::class,'show']);
Route::post('/insert_unit_rp_info', [unit_rp_controler::class,'insert']);
Route::delete('/delete/{model}/{id}', [unit_rp_controler::class,'deletes']);