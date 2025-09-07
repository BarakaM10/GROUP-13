<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $programs = Program::when($search, function ($query, $search) {
            return $query->where('Name', 'like', "%{$search}%")->orWhere('Description', 'like', "%{$search}%");
        })->paginate(10);
        return view('programs.index', compact('programs'));
    }

    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'NationalAlignment' => 'nullable|string',
            'FocusAreas' => 'nullable|string',
            'Phases' => 'nullable|string',
        ]);
        Program::create($validated);
        return redirect()->route('programs.index')->with('success', 'Program created.');
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|string',
            'NationalAlignment' => 'nullable|string',
            'FocusAreas' => 'nullable|string',
            'Phases' => 'nullable|string',
        ]);
        $program->update($validated);
        return redirect()->route('programs.index')->with('success', 'Program updated.');
    }

    public function destroy(Program $program)
    {
        if ($program->projects()->exists()) {
            return back()->with('error', 'Cannot delete program with linked projects.');
        }
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program deleted.');
    }
}
