<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function list()
    {
        return view('experiences.list', ['experiences' => Experience::all()]);
    }

    public function addForm()
    {

        return view('experiences.add');
    }

    public function add()
    {

        $attributes = request()->validate([
            'position' => 'required',
            'company' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $experience = new Experience();
        $experience->position = $attributes['position'];
        $experience->company = $attributes['company'];
        $experience->description = $attributes['description'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];

        $experience->save();

        return redirect('/experiences/list')
            ->with('message', 'Experiences has been added!');
    }

    public function editForm(Experience $experience)
    {
        return view('experiences.edit', [
            'experience' => $experience,
        ]);

    }
    public function edit(Experience $experience)
    {
        
        $attributes = request()->validate([
            'position' => 'required',
            'company' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $experience->position = $attributes['position'];
        $experience->company = $attributes['company'];
        $experience->description = $attributes['description'];
        $experience->start_date = $attributes['start_date'];
        $experience->end_date = $attributes['end_date'];


        $experience->save();

        return redirect('/experiences/list')
            ->with('message', 'experience has been edited!');
    }

    public function delete(Experience $experience)
    {
        $experience->delete();
        return redirect('/experiences/list')->with('success', 'Experience deleted successfully.');
    }
}
