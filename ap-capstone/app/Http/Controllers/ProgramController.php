<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController
{
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'national_alignment' => 'nullable|string',
            'focus_areas' => 'nullable|string',
            'phases' => 'nullable|string',
        ]);

        Program::create($validated);

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    public function show(Program $program)
    {
        return view('programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'national_alignment' => 'nullable|string',
            'focus_areas' => 'nullable|string',
            'phases' => 'nullable|string',
        ]);

        $program->update($validated);

        return redirect()->route('programs.show', $program)->with('success', 'Program updated successfully.');
    }

    public function destroy(Program $program)
    {
        if ($program->projects()->count() > 0) {
            return back()->with('error', 'Cannot delete program with linked projects.');
        }
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }

    public function projects(Program $program)
    {
        $projects = $program->projects;
        return view('programs.projects', compact('program', 'projects'));
    }
}