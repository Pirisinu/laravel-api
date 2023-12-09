<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();

        $messages = [
            'title.required' => 'The type name is required.',
            'title.min' => 'The type name cannot be under 5 characters.',
            'title.max' => 'The type name cannot exceed 255 characters.',
            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'description.min' => 'The description name cannot be under 10 characters.',
        ];
        $request->validate([
            'title' => 'required|string|min:5|max:255',
            'start_date' => 'required|date',
            'description' => 'required|string|min:10',
        ], $messages);

        $new_type = new Type();
        $new_type->fill($form_data);
        $new_type->save();

        return redirect()->route('admin.types.show', $new_type->id)->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        $next = Type::where('id', '>', $type->id)->first();
        $prev = Type::where('id', '<', $type->id)->orderBy('id', 'desc')->first();
        return view('admin.types.show', compact('type', 'next', 'prev'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $typeToEdit = Type::find($id);

        if (!$typeToEdit) {
            return redirect()
                ->route('admin.type.index')
                ->with('error', 'Type not found.');
        }

        return view('admin.types.edit', compact('typeToEdit'));
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
            'name' => 'required',
            'description' => 'required'
        ]);

        $typeToUpdate = Type::find($id);

        if (!$typeToUpdate) {
            return redirect()
                ->route('admin.type.index')
                ->with('error', 'Type not found.');
        }

        $typeToUpdate->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        $typeToUpdate->save();

        return redirect()
            ->route('admin.type.show', ['type' => $typeToUpdate->id])
            ->with('success', 'Project aggiornato con successo.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        if (!$type) {
            return redirect()->route('admin.type.index')->with('error', 'Type not found.');
        }
        $type->delete();
        return redirect()->route('admin.type.index')->with('success', 'Type successfully deleted.');
    }
}
