<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Program;
use App\Models\Facility;
use App\Models\Participant;
use App\Models\ProjectParticipant;
use Illuminate\Http\Request;

class ProjectController
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $programs = Program::all();
        $facilities = Facility::all();
        return view('projects.create', compact('programs', 'facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'facility_id' => 'required|exists:facilities,id',
            'title' => 'required|string|max:255',
            'nature_of_project' => 'nullable|in:' . implode(',', Project::NATURES),
            'description' => 'nullable|string',
            'innovation_focus' => 'nullable|string|max:255',
            'prototype_stage' => 'nullable|in:' . implode(',', Project::PROTOTYPE_STAGES),
            'testing_requirements' => 'nullable|string',
            'commercialization_plan' => 'nullable|string',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('participants.participant', 'outcomes');
        $participants = Participant::all();
        return view('projects.show', compact('project', 'participants'));
    }

    public function edit(Project $project)
    {
        $programs = Program::all();
        $facilities = Facility::all();
        return view('projects.edit', compact('project', 'programs', 'facilities'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'program_id' => 'required|exists:programs,id',
            'facility_id' => 'required|exists:facilities,id',
            'title' => 'required|string|max:255',
            'nature_of_project' => 'nullable|in:' . implode(',', Project::NATURES),
            'description' => 'nullable|string',
            'innovation_focus' => 'nullable|string|max:255',
            'prototype_stage' => 'nullable|in:' . implode(',', Project::PROTOTYPE_STAGES),
            'testing_requirements' => 'nullable|string',
            'commercialization_plan' => 'nullable|string',
        ]);

        $project->update($validated);

        return redirect()->route('projects.show', $project)->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    public function assignParticipant(Request $request, Project $project)
    {
        $validated = $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'role_on_project' => 'nullable|in:' . implode(',', ProjectParticipant::ROLES_ON_PROJECT),
            'skill_role' => 'nullable|in:' . implode(',', ProjectParticipant::SKILL_ROLES),
        ]);

        $project->participants()->create($validated);

        return redirect()->back()->with('success', 'Participant assigned successfully.');
    }
}