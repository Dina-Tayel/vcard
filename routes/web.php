<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\profileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

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

// Route::get('/',function(){
//     return View('welcome');
// });

Route::get('/profile/{user:username}/{profilename?}',[UserController::class,"profile"]); //model Bending

// Route::get('/profile/{username}/{id}/{profilename?}',[UserController::class,"profile"]);
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
    Route::put('/update/{user}',[UserController::class,"update"]);
    //delete account
    Route::delete('delete/{id}',[UserController::class,'destroy'])->name('user.delete');

    // ---------------  admin part--------------------------
    Route::group(['middleware'=>'Allusers','prefix'=>'admin'],function(){
        Route::get('/showAllusers',[AdminController::class,'showAllUsers'])->name('Allusers');
        Route::get('/showAllprofiles',[AdminController::class,'showAllProfiles'])->name('Allprofiles');
        Route::get('/showuserprofiles/{id}',[AdminController::class,'showUserProfiles'])->name('user.profiles');

    });
   
});

//------------- user profiles -------------------------------

// Route::resource('/userProfile', profileController::class);
Route::group(['prefix'=>'userProfile','middleware'=>'auth'],function(){
    // user profile
    Route::get('/',[profileController::class,"index"])->name("userProfile.index");
    Route::get('/create',[profileController::class,"create"])->name("userProfile.create");
    Route::post('/store',[profileController::class,"store"])->name("userProfile.store");
    Route::get('/show',[profileController::class,"show"])->name("userProfile.show");
    Route::post('edit/{profile}',[profileController::class,"edit"])->name("userProfile.edit");
    Route::put('/update/{profile}',[profileController::class,"update"])->name("userProfile.update");
    Route::delete('/delete/{profile}',[profileController::class,"destroy"])->name("userProfile.destroy");
});
