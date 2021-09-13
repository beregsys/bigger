<?php

use App\Http\Controllers\Api\V1\TacticApiController;
use App\Http\Controllers\Api\V1\TechniqueApiController;
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
Route::name('api.')->group(function () {
    Route::resource('v1/tactics', TacticApiController::class)->only('index');
    Route::resource('v1/techniques', TechniqueApiController::class)->only(['index', 'show']);
});

