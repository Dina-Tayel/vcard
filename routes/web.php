<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\profileController as ProfileProfileController;
use App\Http\Controllers\User\UserController;
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
*/;

Route::get('/profile/{username}/{profilename?}',[UserController::class,"profile"]);
// -------- authentication -----------------------------------
Route::group(['middleware'=>'guest'],function(){
//login   
Route::get('/',[LoginController::class,"create"])->name("login");
Route::post('/loginrequest',[LoginController::class,"store"]);
//register
Route::get('/register',[RegisterController::class,"create"]);
Route::post('/registerequest',[RegisterController::class,"store"]);
});
 
Route::group(['middleware'=>'auth'],function(){
    //----------------user account part---------------------
    //logout
    Route::get('/logout',[LoginController::class,"logout"]);
    //edit account 
    Route::get('/edit',[UserController::class,"edit"]);
    Route::put('/update',[UserController::class,"update"]);
    //delete account
    Route::delete('delete/{id}',[UserController::class,'destroy'])->name('user.delete');

    // ---------------  admin part--------------------------
    Route::group(['middleware'=>'Allusers'],function(){
        Route::get('admin/showusers',[AdminController::class,'showUsers'])->name('Allusers');
        Route::get('admin/showprofiles',[AdminController::class,'showProfiles'])->name('Allprofiles');

    });
   
});

//------------- user profiles -------------------------------

Route::resource('/userProfile', ProfileProfileController::class);
// Route::group(['prefix'=>'userProfile','middleware'=>'auth'],function(){
//     // user profile
//     Route::get('/',[ProfileProfileController::class,"index"])->name("userProfile.index");
//     Route::get('/create',[ProfileProfileController::class,"create"])->name("userProfile.create");
//     Route::post('/store',[ProfileProfileController::class,"store"])->name("userProfile.store");
//     Route::get('/show',[ProfileProfileController::class,"show"])->name("userProfile.show");
//     Route::get('edit/{id}',[ProfileProfileController::class,"edit"])->name("userProfile.edit");
//     Route::put('/update/{id}',[ProfileProfileController::class,"update"])->name("userProfile.update");
//     Route::delete('/delete/{id}',[ProfileProfileController::class,"destroy"])->name("userProfile.destroy");
// });
