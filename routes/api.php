<?php

use App\Models\User;
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

Route::group([
    'midleware'=>[
        'api',
    ],
    'namespace'=>'App\Http\Controllers',
    'prefix'=>'auth'
],function($request){
    Route::get('/foo', function () {
        $user = User::all();
        return response()->json($user);
    });
 
});
Route::get('/', function () {
    return response()->json('ok');
});
