<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Auth\LoginController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('api')->group(function () {
    // Projects API Routes
    Route::get('projects', [ProjectController::class, 'index']);
    Route::get('projects/{id}', [ProjectController::class, 'show']);
    Route::post('projects', [ProjectController::class, 'store']);
    Route::put('projects/{id}', [ProjectController::class, 'update']);
    Route::delete('projects/{id}', [ProjectController::class, 'destroy']);

    // Skills API Routes
    Route::get('skills', [SkillController::class, 'index']);
    Route::get('skills/{id}', [SkillController::class, 'show']);
    Route::post('skills', [SkillController::class, 'store']);
    Route::put('skills/{id}', [SkillController::class, 'update']);
    Route::delete('skills/{id}', [SkillController::class, 'destroy']);

    // Experiences API Routes
    Route::get('experiences', [ExperienceController::class, 'index']);
    Route::get('experiences/{id}', [ExperienceController::class, 'show']);
    Route::post('experiences', [ExperienceController::class, 'store']);
    Route::put('experiences/{id}', [ExperienceController::class, 'update']);
    Route::delete('experiences/{id}', [ExperienceController::class, 'destroy']);

    Route::post('login', [LoginController::class, 'login']);
});

