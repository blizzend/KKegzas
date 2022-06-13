<?php

use App\Http\Controllers\AppartmentController;
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

// Route::get('/', function () {
//     return view('Appartments') ;
// });

Route::get('/', [AppartmentController::class, 'index']);
Route::get('/butai', [AppartmentController::class, 'index']);

Route::get('/butai/Add', [AppartmentController::class, 'addFile']);
Route::post('/butai/Add', [AppartmentController::class, 'store']);

Route::get('/butai/View', [AppartmentController::class, 'view']);
Route::get('/butai/View/{appartment}', [AppartmentController::class, 'viewFile']);

Route::get('/butai/edit/{id}', [AppartmentController::class, 'editFile']);
Route::post('/butai/edit/{id}', [AppartmentController::class, 'edit']);

Route::get('/butai/delete/ask/{id}', [AppartmentController::class, 'deleteFile']);
Route::get('/butai/delete/{id}', [AppartmentController::class, 'delete']);

Route::get('/butai/search', [AppartmentController::class, 'search']);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
