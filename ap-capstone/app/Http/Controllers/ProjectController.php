<?php
namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Program;
use App\Models\Facility;
use App\Models\Participant;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Other methods (index, show, create, store, destroy) handled by Person C, not included here.
    // Only edit/update methods included for Week 2 task.

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
            'participants' => 'array',
            'participants.*' => 'exists:participants,ParticipantId',
        ]);

        $project->update($validated);

        $project->participants()->sync($validated['participants'] ?? []);

        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }
};


