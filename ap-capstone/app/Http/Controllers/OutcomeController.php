<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Project;
use Illuminate\Http\Request;

class OutcomeController
{
    public function index()
    {
        $outcomes = Outcome::all();
        return view('outcomes.index', compact('outcomes'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('outcomes.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'artifact' => 'nullable|file|mimes:pdf,zip,jpg,png,cad|max:2048',
            'outcome_type' => 'nullable|in:' . implode(',', Outcome::OUTCOME_TYPES),
            'quality_certification' => 'nullable|string|max:255',
            'commercialization_status' => 'nullable|in:' . implode(',', Outcome::COMMERCIALIZATION_STATUSES),
        ]);

        if ($request->hasFile('artifact')) {
            $validated['artifact_link'] = $request->file('artifact')->store('artifacts', 'public');
        }

        Outcome::create($validated);

        return redirect()->route('outcomes.index')->with('success', 'Outcome created successfully.');
    }

    public function show(Outcome $outcome)
    {
        return view('outcomes.show', compact('outcome'));
    }

    public function edit(Outcome $outcome)
    {
        $projects = Project::all();
        return view('outcomes.edit', compact('outcome', 'projects'));
    }

    public function update(Request $request, Outcome $outcome)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'artifact' => 'nullable|file|mimes:pdf,zip,jpg,png,cad|max:2048',
            'outcome_type' => 'nullable|in:' . implode(',', Outcome::OUTCOME_TYPES),
            'quality_certification' => 'nullable|string|max:255',
            'commercialization_status' => 'nullable|in:' . implode(',', Outcome::COMMERCIALIZATION_STATUSES),
        ]);

        if ($request->hasFile('artifact')) {
            $validated['artifact_link'] = $request->file('artifact')->store('artifacts', 'public');
        }

        $outcome->update($validated);

        return redirect()->route('outcomes.show', $outcome)->with('success', 'Outcome updated successfully.');
    }

    public function destroy(Outcome $outcome)
    {
        $outcome->delete();

        return redirect()->route('outcomes.index')->with('success', 'Outcome deleted successfully.');
    }
}