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

Route::get('/skills', function(){
    $skills = Skill::orderBy('name')->get();
    foreach($skills as $key => $value)
    {
        $skills[$key]['user'] = User::where('id', $value['user_id'])->first();
    }
    return $skills;

});

Route::get('/skills/{skills?}', function(Skill $skills){
    $skills[$key]['user'] = User::where('id', $skills['id'])->first();
    return $skills;
});

Route::get('/educations', function(){

    $educations = Education::orderBy('institution')->get();
    return $educations;

});

Route::get('/educations/{educations?}', function(Education $educations){
    return $educations;
});

Route::get('/experiences', function(){
    $experiences = Experience::orderBy('company')->get();
    return $experiences;
});

Route::get('/experiences/{experiences?}', function(Experience $experiences){
    $experiences = Experience::orderBy('company')->get();
    return $experiences;
});

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

Route::get('/projects/{projects?}', function(Project $projects){

    if($projects['image'])
    {
        $projects['image'] = env('APP_URL').'storage/'.$projects['image'];
    }

    return $projects;

});


