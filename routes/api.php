<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\CharacterController;

Route::group(['prefix' => 'characters'], function() {
    Route::get("/", [CharacterController::class, "index"]);
    Route::post("/", [CharacterController::class, "save"]);;
    Route::put("/", [CharacterController::class, "update"]);
    Route::delete("/", [CharacterController::class, "delete"]);
});


Route::fallback(function(){
    return response()->json(['message' => 'Not Found!'], 404);
});
