<?php
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');



Route::get('/redirect/{service}',[App\Http\Controllers\SocialController::class,'redirect']);

Route::get('/callback/{service}',[App\Http\Controllers\SocialController::class,'callback']);



Route::get('fillable',[App\Http\Controllers\CrudController::class,'getOffers']);
  
Route::group(['prefix' => 'offers'],function(){
   
         route::get('store',[App\Http\Controllers\CrudController::class,'store']);

         route::get('create',[App\Http\Controllers\CrudController::class,'create']); 

         route::post('insert',[App\Http\Controllers\CrudController::class,'insert']); 
});

################################################################################
#####################  authentication and guards ###############################
################################################################################

Route::get('/admin', [App\Http\Controllers\Auth\CustomAuthController::class,'admin']) -> middleware('auth:admins') -> name('admin');
Route::get('/admin/login', [App\Http\Controllers\Auth\CustomAuthController::class,'adminlogin']) -> name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Auth\CustomAuthController::class,'checkadminlogin']) -> name('save.admin.login');

Route::get('/user', [App\Http\Controllers\Auth\CustomAuthController::class,'user']) -> middleware('auth') -> name('user');

Route::get('/error', function(){
    return 'no eres admin';
}) -> name('noadmin');

####################  listar libros ############################################# 

Route::get('/home/libros',[App\Http\Controllers\LibrosController::class,'listarlibros'])->name('home')->middleware('verified');


























