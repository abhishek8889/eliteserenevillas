<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authentication\AuthenticationController;
use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\VillaController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\FrontVillas;

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

Route::get('test',[FrontVillas::class,'test']);

Route::get('/' ,function(){
    return view('welcome');
});
Route::get('/admin-login',[AuthenticationController::class,'index']);
Route::post('/loginprocc',[AuthenticationController::class,'loginProcc']);
Route::get('/logout',[AuthenticationController::class,'logout']);




//admin
Route ::group(['middleware' =>['admin']],function(){
Route::get('/admin-dashboard',[AdminDashController::class,'index']);
Route::get('admin-dashboard/import',[AdminDashController::class,'import']);
Route::post('admin-dasboard/import-data',[AdminDashController::class,'importproc'])->name('importproc');
Route::get('admin-dashboard/export-data/{id}',[AdminDashController::class,'export']);

Route::get('admin-dashboard/villas',[VillaController::class,'index']);
Route::get('admin-dashboard/add-Villas',[VillaController::class,'addvillas']);
Route::post('admin-dashboard/addVillasProc',[VillaController::class,'addProcc'])->name('addVillasProc');
Route::post('admin-dashboard/updateVillasProc',[VillaController::class,'updateProcc'])->name('updateVillasProc');
Route::post('admin-dashboard/addcustome',[VillaController::class,'addcustome'])->name('addcustome');
Route::post('admin-dashboard/cutomedelete',[VillaController::class,'cutomedelete'])->name('cutomedelete');

Route::get('admin-dashboard/villa-update/{slug}',[VillaController::class,'updateVilla']);
Route::get('admin-dashboard/villas/{slug}',[VillaController::class,'villaView']);
Route::get('admin-dashboard/villas/delete/{id}',[VillaController::class,'delete']);
Route::post('admin-dashboard/villas/update',[VillaController::class,'update']);

Route::post('admin-dashboard/pricing',[PricingController::class,'pricingAdd']);
Route::get('admin-dashboard/pricing/{id}',[PricingController::class,'delete']);
Route::get('admin-dashboard/calendar/{id}',[VillaController::class,'calendar']);

Route::post('admin-dashboard/villas/remove-image', [VillaController::class,'removeImage']);
Route::post('admin-dashboard/villas/add-image', [VillaController::class,'addImage']);

// Amenities
Route::get('admin-dashboard/amenities',[AmenitiesController::class, 'index']);
Route::post('admin-dashboard/amenities/amenities-add', [AmenitiesController::class, 'add']);
Route::post('admin-dashboard/amenities/amenities-remove', [AmenitiesController::class, 'remove']);
Route::post('admin-dashboard/amenities/amenities-update', [AmenitiesController::class, 'update']);

// service
Route::get('admin-dashboard/services',[ServiceController::class,'index']);
Route::post('admin-dashboard/services/add',[ServiceController::class,'serviceadd'])->name('serviceadd');
Route::post('admin-dashboard/services/delete',[ServiceController::class,'delete'])->name('servicedelete');

//categories
Route::get('admin-dashboard/catgories',[CategoryController::class,'index']);
Route::post('admin-dashboard/catgories/add',[CategoryController::class,'catgoriesadd'])->name('catgoriesadd');
Route::post('admin-dashboard/catgories/delete',[CategoryController::class,'delete'])->name('catgoriesdelete');
});


/////front
Route::get('villas',[FrontVillas::class,'index']);
Route::get('villas/{slug}',[FrontVillas::class,'villaview']);
Route::get('villas/calendar/{id}',[FrontVillas::class,'calendar']);
