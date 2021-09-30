<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('index', [\App\Http\Controllers\CrudController::class, 'index']);
Route::post('formsubmit', [\App\Http\Controllers\CrudController::class, 'store']);
Route::get('create', [\App\Http\Controllers\CrudController::class, 'create'])->name('create');
Route::get('edit/{id}', [\App\Http\Controllers\CrudController::class, 'edit']);
Route::post('update/{id}', [\App\Http\Controllers\CrudController::class, 'update']);
Route::get('delete/{id}', [\App\Http\Controllers\CrudController::class, 'destroy']);


// Route::get('ars-index', [\App\Http\Controllers\ArsalanController::class, 'index']);
// Route::post('ars-formsubmit', [\App\Http\Controllers\CrudController::class, 'store']);

Route::get('ars-index', [\App\Http\Controllers\ArsalanController::class, 'index']);
Route::get('/getUsers', [\App\Http\Controllers\ArsalanController::class, 'getUsers']);
Route::post('/addUser', [\App\Http\Controllers\ArsalanController::class, 'addUser']);
Route::post('/updateUser', [\App\Http\Controllers\ArsalanController::class, 'updateUser']);
Route::get('/deleteUser/{id}', [\App\Http\Controllers\ArsalanController::class, 'deleteUser']);

Route::get('ajax-index', [\App\Http\Controllers\AjaxCrudController::class, 'index']);
Route::get('ajax-response', [\App\Http\Controllers\AjaxCrudController::class, 'response']);
Route::post('ajax-store', [\App\Http\Controllers\AjaxCrudController::class, 'store']);
Route::delete('ajax-delete/{id}', [\App\Http\Controllers\AjaxCrudController::class, 'destroy']);
Route::get('ajax-show/{id}', [\App\Http\Controllers\AjaxCrudController::class, 'show']);
Route::put('ajax-update', [\App\Http\Controllers\AjaxCrudController::class, 'update']);