<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EducationController;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/login', [LoginController::class, 'loginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth');

Route::get('/projects/list', [ProjectController::class, 'list'])->middleware('auth');
Route::get('/projects/add', [ProjectController::class, 'addForm'])->middleware('auth');
Route::post('/projects/add', [ProjectController::class, 'add'])->middleware('auth');
Route::get('/projects/edit/{project:id}', [ProjectController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/projects/edit/{project:id}', [ProjectController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/projects/delete/{project:id}', [ProjectController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/projects/image/{project:id}', [ProjectController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/projects/image/{project:id}', [ProjectController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/skills/list', [SkillController::class, 'list'])->middleware('auth');
Route::get('/skills/delete/{skill:id}', [SkillController::class, 'delete'])->where('skill', '[0-9]+')->middleware('auth');
Route::get('/skills/add', [SkillController::class, 'addForm'])->middleware('auth');
Route::post('/skills/add', [SkillController::class, 'add'])->middleware('auth');
Route::get('/skills/edit/{skill:id}', [SkillController::class, 'editForm'])->where('skill', '[0-9]+')->middleware('auth');
Route::post('/skills/edit/{skill:id}', [SkillController::class, 'edit'])->where('skill', '[0-9]+')->middleware('auth');


Route::get('/experiences/list', [ExperienceController::class, 'list'])->middleware('auth');
Route::get('/experiences/delete/{experience:id}', [ExperienceController::class, 'delete'])->where('experience', '[0-9]+')->middleware('auth');
Route::get('/experiences/add', [ExperienceController::class, 'addForm'])->middleware('auth');
Route::post('/experiences/add', [ExperienceController::class, 'add'])->middleware('auth');
Route::get('/experiences/edit/{experience:id}', [ExperienceController::class, 'editForm'])->where('experience', '[0-9]+')->middleware('auth');
Route::post('/experiences/edit/{experience:id}', [ExperienceController::class, 'edit'])->where('experience', '[0-9]+')->middleware('auth');

Route::get('/educations/list', [EducationController::class, 'list'])->middleware('auth');
Route::get('/educations/delete/{education:id}', [EducationController::class, 'delete'])->where('education', '[0-9]+')->middleware('auth');
Route::get('/educations/add', [EducationController::class, 'addForm'])->middleware('auth');
Route::post('/educations/add', [EducationController::class, 'add'])->middleware('auth');
Route::get('/educations/edit/{education:id}', [EducationController::class, 'editForm'])->where('education', '[0-9]+')->middleware('auth');
Route::post('/educations/edit/{education:id}', [EducationController::class, 'edit'])->where('education', '[0-9]+')->middleware('auth');
; 



