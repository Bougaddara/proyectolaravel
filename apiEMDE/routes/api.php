<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\libroController;
use App\Http\Resources\libros;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('CrearCuenta',[App\Http\Controllers\API\AuthController::class,'crearCuenta']);

Route::post('IniciarSesion',[App\Http\Controllers\API\AuthController::class,'IniciarSesion']);


Route::middleware('auth:api')->group( function (){
    Route::resource('libros',API\libroController::class)->only([
    'index', 'show' //, 'create', 'store', 'update', 'destroy'
    ]);

});

/*Route::middleware('auth:api')->group( function (){
    Route::resource('libros', 'API\libroController');
});*/


//Route::resource('libros','libroController');



//Route::get('/user/{id}', 'libroController@userPosts');

##########################################################################33
Route::middleware('auth:admin')->group( function (){
    Route::resource('libros',AdminController::class)->only([
    'index', 'show', 'create', 'store', 'update', 'destroy'
    ]);

});