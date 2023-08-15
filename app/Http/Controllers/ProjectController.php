<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    public function list()
    {
        return view('projects.list', ['projects' => Project::all()]);
    }
    public function addForm()
    {

        return view('projects.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        $project = new Project();
        $project->title = $attributes['title'];
        $project->description = $attributes['description'];
        $project->link = $attributes['link'];
        $project->save();

        return redirect('/projects/list')
            ->with('message', 'Project has been added!');
    }

    public function editForm(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        $project->title = $attributes['title'];
        $project->description = $attributes['description'];
        $project->link = $attributes['link'];

        $project->save();

        return redirect('/projects/list')
            ->with('message', 'Project has been edited!');
    }


    public function delete(Project $project)
    {
        $project->delete();
        return redirect('/projects/list')->with('success', 'project deleted successfully.');
    }

    public function imageForm(Project $project)
    {
        return view('projects.image', [
            'project' => $project,
        ]);
    }

    public function image(Project $project)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($project->image);
        
        $path = request()->file('image')->store('projects');

        $project->image = $path;
        $project->save();
        
        return redirect('/projects/list')
            ->with('message', 'Project image has been edited!');
    }
}

