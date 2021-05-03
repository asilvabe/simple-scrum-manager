<?php

use App\Http\Controllers\Api\DeveloperSearchController;
use App\Http\Controllers\Api\DeveloperTeamController;
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

Route::name('api.')->middleware('auth')->group(function () {
    Route::apiResource('developer-teams', DeveloperTeamController::class)->except('show');
    Route::get('developers', [DeveloperSearchController::class, 'index']);
});
