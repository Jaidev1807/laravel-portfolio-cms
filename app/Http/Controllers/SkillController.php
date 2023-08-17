<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function list()
    {
        $skills = SKill::where('user_id', Auth::id())->get();
        return view('skills.list', ['skills' => $skillss]);
    }

    public function addForm()
    {
        return view('skills.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill = new Skill();
        $skill->name = $attributes['name'];
        $skill->description = $attributes['description'];
        $skill->user_id = Auth::id(); // Associate skill with the logged-in user
        $skill->save();

        return redirect('/skills/list')
            ->with('message', 'Skill has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function edit(Skill $skill)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $skill->name = $attributes['name'];
        $skill->description = $attributes['description'];
        $skill->save();

        return redirect('/skills/list')
            ->with('message', 'Skill has been edited!');
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        return redirect('/skills/list')->with('success', 'Skill deleted successfully.');
    }
}

