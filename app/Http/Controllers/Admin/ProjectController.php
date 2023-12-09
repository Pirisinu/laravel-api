<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        $projects = Project::with('type')->paginate(10);
        return view('admin.projects.index', compact('projects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = Project::all();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types','technologies', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $form_data = $request->all();
        $messages = [
            'title.required' => 'The project name is required.',
            'title.min' => 'The project name cannot be under 5 characters.',
            'title.max' => 'The project name cannot exceed 255 characters.',
            'start_date.required' => 'The project start date is required.',
            'start_date.date' => 'Please enter a valid date for the project start date.',
            'technologies.required' => 'The technologies is required.',
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'description.min' => 'The description name cannot be under 10 characters.',
        ];
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'type' => 'nullable',
            'technologies' => 'required',
            'start_date' => 'required|date',
            'description' => 'required|string|min:10',
        ], $messages);

        $new_project = new Project();
        $new_project->fill($form_data);
        $new_project->save();
        $new_project->technologies()->attach($request->input('technologies'));


        return redirect()->route('admin.project.show', $new_project->id)->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $types = Type::all();
        $next = Project::where('id', '>', $project->id)->first();
        $prev = Project::where('id', '<', $project->id)->orderBy('id', 'desc')->first();
        return view('admin.projects.show', compact('project', 'types' , 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $projectToEdit = Project::find($id);
        $types = Type::all();
        $technologies = Technology::all();
        if (!$projectToEdit) {
            return redirect()
                ->route('admin.project.index')
                ->with('error', 'Project not found.');
        }

        return view('admin.projects.edit', compact('projectToEdit', 'types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validazione dei dati del modulo
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'description' => 'required'
        ]);

        $project = Project::find($id);

        if (!$project) {
            return redirect()
                ->route('admin.project.index')
                ->with('error', 'Project not found.');
        }

        $project->update([
            'title' => $request->input('title'),
            'start_date' => $request->input('start_date'),
            'description' => $request->input('description')
        ]);

        $project->type_id = $request->input('type_id');
        $project->save();

        $selectedTechnologies = $request->input('technologies', []);
        $project->technologies()->sync($selectedTechnologies);

        return redirect()
            ->route('admin.project.show', ['project' => $project->id])
            ->with('success', 'Project aggiornato con successo.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!$project) {
            return redirect()->route('admin.project.index')->with('error', 'Project not found.');
        }
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project successfully deleted.');
    }
}
