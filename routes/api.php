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

Route::get('/skills', function(Request $request){
    $userId = $request->header('user-id'); // Assuming the header key is 'user-id'
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    else{
    $skills = Skill::where('user_id', $userId)->orderBy('name')->get();
    return $skills;
    }

});

Route::get('/skills/user/{user?}', function(User $user){
    if (!$user->id) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    $skills = Skill::where('user_id', $user->id)->orderBy('name')->get();
    return $skills;
});

Route::get('/skills/{skills?}', function(Skill $skills){
    $skills[$key]['user'] = User::where('id', $skills['id'])->first();
    return $skills;
});

// ----------------educations--------------------------------

Route::get('/educations', function(Request $request){
    $userId = $request->header('user-id'); // Assuming the header key is 'user-id'
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    else{
        $educations = Education::where('user_id', $userId)->orderBy('institution')->get();
        return $educations;
    }

});

Route::get('/educations/user/{user?}', function(User $user){
    if (!$user->id) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    $educations = Education::where('user_id', $user->id)->orderBy('institution')->get();
    return $educations;
});

Route::get('/educations/{educations?}', function(Education $educations){
    return $educations;
});

//------------------------experience--------------------------

Route::get('/experiences', function(Request $request){
    $userId = $request->header('user-id'); // Assuming the header key is 'user-id'
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    else{
        $experiences = Experience::where('user_id', $userId)->orderBy('company')->get();
        return $experiences;
    }

});

Route::get('/experiences/user/{user?}', function(User $user){
    if (!$user->id) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    $experiences = Experience::where('user_id', $user->id)->orderBy('company')->get();
    return $experiences;
});

Route::get('/experiences/{experiences?}', function(Experience $experiences){
    $experiences = Experience::orderBy('company')->get();
    return $experiences;
});

//-------------------- Projects -----------------------------

Route::get('/projects', function(Request $request){
    $userId = $request->header('user-id'); // Assuming the header key is 'user-id'
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    else{
        $projects = Project::where('user_id', $userId)->orderBy('title')->get();
        return $projects;
    }

});

Route::get('/projects/user/{user?}', function(User $user){
    if (!$user->id) {
        return response()->json(['error' => 'User ID not provided in the header'], 400);
    }
    $projects = Project::where('user_id', $user->id)->orderBy('title')->get();
    return $projects;
});

Route::get('/projects/{projects?}', function(Project $projects){

    if($projects['image'])
    {
        $projects['image'] = env('APP_URL').'storage/'.$projects['image'];
    }

    return $projects;
});



