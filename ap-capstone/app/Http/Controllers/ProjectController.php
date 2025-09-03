<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Program;
use App\Models\Facility;
use App\Models\Participant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $facilityId = $request->query('facility_id');
        $programId = $request->query('program_id');

        $projects = Project::when($facilityId, fn($q, $f) => $q->where('FacilityId', $f))
            ->when($programId, fn($q, $p) => $q->where('ProgramId', $p))
            ->with(['program', 'facility'])
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function create()
    {
        $programs = Program::all();
        $facilities = Facility::all();
        $participants = Participant::all();
        return view('projects.create', compact('programs', 'facilities', 'participants'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ProgramId' => 'required|exists:programs,ProgramId',
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Title' => 'required|string|max:255',
            'NatureOfProject' => 'nullable|string',
            'Description' => 'nullable|string',
            'InnovationFocus' => 'nullable|string',
            'PrototypeStage' => 'nullable|string',
            'TestingRequirements' => 'nullable|string',
            'CommercializationPlan' => 'nullable|string',
            'participants' => 'array',
            'participants.*' => 'exists:participants,ParticipantId',
        ]);

        $project = Project::create($validated);

        if (isset($validated['participants'])) {
            $project->participants()->attach($validated['participants']);
        }

        return redirect()->route('projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        $programs = Program::all();
        $facilities = Facility::all();
        $participants = Participant::all();
        return view('projects.edit', compact('project', 'programs', 'facilities', 'participants'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'ProgramId' => 'required|exists:programs,ProgramId',
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Title' => 'required|string|max:255',
            'NatureOfProject' => 'nullable|string',
            'Description' => 'nullable|text',
            'InnovationFocus' => 'nullable|string', // Editable per Week 2
            'PrototypeStage' => 'nullable|string', // Editable per Week 2
            'TestingRequirements' => 'nullable|string',
            'CommercializationPlan' => 'nullable|text', // Editable per Week 2
            'Description' => 'nullable|string',
            'InnovationFocus' => 'nullable|string',
            'PrototypeStage' => 'nullable|string',
            'TestingRequirements' => 'nullable|string',
            'CommercializationPlan' => 'nullable|string',
            'participants' => 'array',
            'participants.*' => 'exists:participants,ParticipantId',
        ]);

        $project->update($validated);
      
        $project->participants()->sync($validated['participants'] ?? []);

        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }

};


    public function destroy(Project $project)
    {
        if ($project->outcomes()->exists() || $project->participants()->exists()) {
            return back()->with('error', 'Cannot delete project with linked records.');
        }
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }
}
