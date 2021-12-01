<?php
use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;
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

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', function(){

    return 'home';
});

Route::get('/redirect/{service}',[App\Http\Controllers\SocialController::class,'redirect']);

Route::get('/callback/{service}',[App\Http\Controllers\SocialController::class,'callback']);


//Route::get('/callback/{service}',SocialController::class);
//Route::get('/redirect/{service}','SocialController@redirect');
//Route::get('/callback/{service}','SocialController@callback');


Route::get('fillable',[App\Http\Controllers\CrudController::class,'getOffers']);
  
Route::group(['prefix' => 'offers'],function(){
   
         route::get('store',[App\Http\Controllers\CrudController::class,'store']);

         route::get('create',[App\Http\Controllers\CrudController::class,'create']); 

         route::post('insert',[App\Http\Controllers\CrudController::class,'insert']); 

});

