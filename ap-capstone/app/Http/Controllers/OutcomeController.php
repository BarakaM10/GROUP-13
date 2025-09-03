<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    public function index(Request $request)
    {
        $projectId = $request->query('project_id');
        $outcomes = Outcome::when($projectId, fn($q, $p) => $q->where('ProjectId', $p))
            ->with('project')
            ->paginate(10);
        return view('outcomes.index', compact('outcomes'));
    }

    public function show(Outcome $outcome)
    {
        return view('outcomes.show', compact('outcome'));
    }

    public function create()
    {
        $projects = Project::all();
        return view('outcomes.create', compact('projects'));
    }
class OutcomeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProjectId' => 'required|exists:projects,ProjectId',
            'Title' => 'required|string|max:255',
            'Description' => 'nullable|text',
            'OutcomeType' => 'nullable|string',
            'QualityCertification' => 'nullable|string',
            'CommercializationStatus' => 'nullable|string',
        ]);

            'ArtifactLink' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048', // File upload
            'OutcomeType' => 'nullable|string', // Metadata
            'QualityCertification' => 'nullable|string', // Metadata
            'CommercializationStatus' => 'nullable|string', // Metadata
        ]);

        if ($request->hasFile('ArtifactLink')) {
            $validated['ArtifactLink'] = $request->file('ArtifactLink')->store('artifacts', 'public');
        }

        Outcome::create($validated);
        return redirect()->route('outcomes.index')->with('success', 'Outcome created.');
    }

    public function edit(Outcome $outcome)
    {
        $projects = Project::all();
        return view('outcomes.edit', compact('outcome', 'projects'));
    }
    public function update(Request $request, Outcome $outcome)
    {
        $validated = $request->validate([
            'ProjectId' => 'required|exists:projects,ProjectId',
            'Title' => 'required|string|max:255',
            'Description' => 'nullable|text',
            'OutcomeType' => 'nullable|string',
            'QualityCertification' => 'nullable|string',
            'CommercializationStatus' => 'nullable|string',
        ]);
            'ArtifactLink' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048', // File upload
            'OutcomeType' => 'nullable|string', // Metadata
            'QualityCertification' => 'nullable|string', // Metadata
            'CommercializationStatus' => 'nullable|string', // Metadata
        ]);

        if ($request->hasFile('ArtifactLink')) {
            if ($outcome->ArtifactLink) {
                Storage::disk('public')->delete($outcome->ArtifactLink);
            }
            $validated['ArtifactLink'] = $request->file('ArtifactLink')->store('artifacts', 'public');
        }

        $outcome->update($validated);
        return redirect()->route('outcomes.index')->with('success', 'Outcome updated.');
    }

    public function destroy(Outcome $outcome)
    {
        $outcome->delete();
        return redirect()->route('outcomes.index')->with('success', 'Outcome deleted.');
    }
};
        if ($outcome->ArtifactLink) {
            Storage::disk('public')->delete($outcome->ArtifactLink);
        }
        $outcome->delete();
        return redirect()->route('outcomes.index')->with('success', 'Outcome deleted.');
    }

    public function download(Outcome $outcome)
    {
        if ($outcome->ArtifactLink && Storage::disk('public')->exists($outcome->ArtifactLink)) {
            $filePath = Storage::disk('public')->path($outcome->ArtifactLink);
            return response()->download($filePath);
        }
        return back()->with('error', 'File not found.');
    }

    public function view(Outcome $outcome)
    {
        if ($outcome->ArtifactLink && Storage::disk('public')->exists($outcome->ArtifactLink)) {
            $filePath = Storage::disk('public')->path($outcome->ArtifactLink);
            $mimeType = mime_content_type($filePath);
            return response()->file($filePath, ['Content-Type' => $mimeType]);
        }
        return back()->with('error', 'File not found.');
    }
};
