<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function get()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function get_by_id($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();

        return response()->json($project, 201); // 201 Created status
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->link = $request->link;
        $project->save();

        return response()->json($project);
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted']);
    }
}
