<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminCurhatController;

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


Route::get('/adm', [AdminController::class, 'index']);
Route::get('/adm/event', [AdminEventController::class, 'index']);
Route::get('/adm/berita', [AdminBeritaController::class, 'index']);
Route::get('/adm/curhat', [AdminCurhatController::class, 'index']);

// create
Route::get('adm/event/create', [AdminEventController::class, 'create']);
Route::get('adm/berita/create', [AdminBeritaController::class, 'create']);

// tangkap data (store)
Route::post('/adm/berita', [AdminBeritaController::class, 'store']);
Route::post('/adm/event', [AdminEventController::class, 'store']);

// tampilkan detail data
Route::get('/adm/event/{id}', [AdminEventController::class, 'show']);
Route::get('/adm/berita/{id}', [AdminBeritaController::class, 'show']);


// tampilkan edit dan update data
Route::get('/adm/berita/{id}/edit', [AdminBeritaController::class, 'edit']);

// patch merupakan metode endpoint untuk mengupdate data
Route::patch('/adm/berita/{id}', [AdminBeritaController::class, 'update']);

// tampilkan edit dan update event
Route::get('adm/event/{id}/edit', [AdminEventController::class,'edit']);

Route::patch('adm/event/{id}', [AdminEventController::class,'update']);

// delete route
Route::delete('/adm/berita/{id}/delete', [AdminBeritaController::class, 'destroy']);
Route::delete('/adm/event/{id}/delete', [AdminEventController::class, 'destroy']);

// update curhat
Route::patch('adm/curhat/{id}', [AdminCurhatController::class, 'update']);


// delete route
Route::delete('/adm/curhat/{id}/delete', [AdminCurhatController::class, 'destroy']);

