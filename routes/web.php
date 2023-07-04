<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\VillaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AuthenticationController::class,'index']);
Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);
Route::get('/logout',[AuthenticationController::class,'logout']);


//admin
Route ::group(['middleware' =>['admin']],function(){
Route::get('/admin-dashboard',[AdminDashController::class,'index']);
Route::get('admin-dashboard/import',[AdminDashController::class,'import']);
Route::post('admin-dasboard/import-data',[AdminDashController::class,'importproc'])->name('importproc');
Route::get('admin-dashboard/export-data',[AdminDashController::class,'export']);

Route::get('admin-dashboard/villas',[VillaController::class,'index']);
Route::get('admin-dashboard/add-Villas',[VillaController::class,'addvillas']);
Route::post('admin-dashboard/addVillasProc',[VillaController::class,'addProcc'])->name('addVillasProc');

Route::get('admin-dashboard/villas/{slug}',[VillaController::class,'villaView']);
Route::get('admin-dashboard/villas/delete/{id}',[VillaController::class,'delete']);

});
