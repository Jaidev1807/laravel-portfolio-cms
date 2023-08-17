<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    public function list()
    {
        $educations = Education::where('user_id', Auth::id())->get();
        return view('educations.list', ['educations' => $educations]);
    }

    public function addForm()
    {

        return view('educations.add');
    }

    public function add()
    {

        $attributes = request()->validate([
            'institution' => 'required',
            'degree' => 'required',
            'major' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $education = new Education();
        $education->institution = $attributes['institution'];
        $education->degree = $attributes['degree'];
        $education->major = $attributes['major'];
        $education->description = $attributes['description'];
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];
        $education->user_id = Auth::id();
        $education->save();

        return redirect('/educations/list')
            ->with('message', 'education has been added!');
    }

    public function editForm(Education $education)
    {
        return view('educations.edit', [
            'education' => $education,
        ]);

    }
    public function edit(Education $education)
    {
        
        $attributes = request()->validate([
            'institution' => 'required',
            'degree' => 'required',
            'major' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $education->institution = $attributes['institution'];
        $education->degree = $attributes['degree'];
        $education->major = $attributes['major'];
        $education->description = $attributes['description'];
        $education->start_date = $attributes['start_date'];
        $education->end_date = $attributes['end_date'];

        $education->save();

        return redirect('/educations/list')
            ->with('message', 'Educations has been edited!');
    }

    public function delete(Education $education)
    {
        $education->delete();
        return redirect('/educations/list')->with('success', 'Educations deleted successfully.');
    }
}
