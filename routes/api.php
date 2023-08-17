<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Skill;
use App\Models\Project;
use App\Models\User;
use App\Models\Education;
use App\Models\Experience;
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
Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

// -----------------Skills------------------------- 

Route::get('/skills', function(){
    $skills = Skill::orderBy('name')->get();
    return $skills;

});

Route::get('/skills/user/{user}', function(User $user){
    $skills = Skill::where('user_id', $user->id)->orderBy('name')->get();
    return $skills;
});


Route::get('/skills/{skills?}', function(Skill $skills){
    $skills[$key]['user'] = User::where('id', $skills['id'])->first();
    return $skills;
});

// ----------------educations--------------------------------
Route::get('/educations', function(){

    $educations = Education::orderBy('institution')->get();
    return $educations;

});
Route::get('/educations/user/{user}', function(User $user){
    $educations = Education::where('user_id', $user->id)->orderBy('institution')->get();
    return $educations;
});
Route::get('/educations/{educations?}', function(Education $educations){
    return $educations;
});

//------------------------experience--------------------------

Route::get('/experiences', function(){
    $experiences = Experience::orderBy('company')->get();
    return $experiences;
});

Route::get('/experiences/user/{user}', function(User $user){
    $experiences = Experience::where('user_id', $user->id)->orderBy('company')->get();
    return $experiences;
});

Route::get('/experiences/{experiences?}', function(Experience $experiences){
    $experiences = Experience::orderBy('company')->get();
    return $experiences;
});

//-------------------- Projects -----------------------------
Route::get('/projects', function(){

    $projects = Project::orderBy('created_at')->get();

    foreach($projects as $key => $value)
    {
        if($value['image'])
        {
            $projects[$key]['image'] = env('APP_URL').'storage/'.$value['image'];
        }
    }

    return $projects;

});

Route::get('/projects/user/{user}', function(User $user){
    $projects = Project::where('user_id', $user->id)->orderBy('name')->get();
    return $projects;
});

Route::get('/projects/{projects?}', function(Project $projects){

    if($projects['image'])
    {
        $projects['image'] = env('APP_URL').'storage/'.$projects['image'];
    }

    return $projects;
});



