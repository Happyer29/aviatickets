<?php

use App\Models\Airport;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//use App\Http\Controllers\AirplaneModelController;
//Route::get('/airplaneModels', function() {
//    // If the Content-Type and Accept headers are set to 'application/json',
//    // this will return a JSON structure. This will be cleaned up later.
//    return \App\Models\AirplaneModel::all();
//});

use App\Http\Controllers\AirplaneModelController;
Route::get('airplaneModels', [AirplaneModelController::class, 'index']);

use App\Http\Controllers\CitiesController;
//Route::get('airplaneModels', 'AirplaneModelController@index');
Route::get('/cities', [CitiesController::class, 'index']);
Route::get('/cities/{city}', [CitiesController::class, 'show']);

use \App\Http\Controllers\AirportController;
//Route::get('/airport/{airport}/city', [AirportController::class, 'city']);
Route::get('/airport/{airport}/city', [AirportController::class, 'city']);
//Route::get('/airport/{airport}/city', function(Airport $airport) {
//    return response()->json($airport->city);
//});

Route::get('/cities/{cities}/airports', [CitiesController::class, 'airports']);
Route::get('/test', function (){
    return response()->json(\App\Models\Cities::find(1)->airports);
});
