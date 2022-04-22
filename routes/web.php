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
*/
Route::get('/',[LoginController::class,"login"]);

Route::get('/profile/{profilename}',[UserController::class,"profile"]);
// -------- authentication 
Route::group(['middleware'=>'guest'],function(){
    //login
Route::get('/login',[LoginController::class,"login"])->name("login");
    //register
Route::get('/register',[RegisterController::class,"register"]);
//handlelogin
Route::post('/loginrequest',[LoginController::class,"loginRequest"]);
//handleRegister
Route::post('/registerequest',[RegisterController::class,"registerRequest"]);

    
});
 
Route::group(['middleware'=>'auth'],function(){
    //----------------user part---------------------
    //logout
    Route::get('/logout',[LoginController::class,"logout"]);
     //edit user data 
    Route::get('/edit',[UserController::class,"edit"]);
    Route::put('/update',[UserController::class,"update"]);
    //delete user
    Route::delete('delete/{id}',[UserController::class,'destroy'])->name('user.delete');

    // ---------------  admin part-----------------
    Route::group(['middleware'=>'Allusers'],function(){
        Route::get('admin/showusers',[AdminController::class,'showUsers'])->name('Allusers');
        Route::get('admin/showprofiles',[AdminController::class,'showProfiles'])->name('Allprofiles');

    });
   
});


//------------- user profiles -------------------------------
Route::group(['prefix'=>'userProfile','middleware'=>'auth'],function(){
    // user profile
    Route::get('/index',[ProfileProfileController::class,"index"]);
    Route::get('/create',[ProfileProfileController::class,"create"]);
    Route::post('/store',[ProfileProfileController::class,"store"]);
    Route::get('/show',[ProfileProfileController::class,"show"]);
    Route::get('edit/{id}',[ProfileProfileController::class,"edit"])->name('edit');
    Route::put('/update/{id}',[ProfileProfileController::class,"update"]);
    Route::delete('/delete/{id}',[ProfileProfileController::class,"destroy"])->name('delete');
});
