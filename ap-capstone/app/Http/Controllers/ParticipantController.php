<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController 
{
    public function index()
    {
        $participants = Participant::all();
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'affiliation' => 'nullable|in:' . implode(',', Participant::AFFILIATIONS),
            'specialization' => 'nullable|in:' . implode(',', Participant::SPECIALIZATIONS),
            'cross_skill_trained' => 'boolean',
            'institution' => 'nullable|in:' . implode(',', Participant::INSTITUTIONS),
        ]);

        Participant::create($validated);

        return redirect()->route('participants.index')->with('success', 'Participant created successfully.');
    }

    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $participant->id,
            'affiliation' => 'nullable|in:' . implode(',', Participant::AFFILIATIONS),
            'specialization' => 'nullable|in:' . implode(',', Participant::SPECIALIZATIONS),
            'cross_skill_trained' => 'boolean',
            'institution' => 'nullable|in:' . implode(',', Participant::INSTITUTIONS),
        ]);

        $participant->update($validated);

        return redirect()->route('participants.show', $participant)->with('success', 'Participant updated successfully.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return redirect()->route('participants.index')->with('success', 'Participant deleted successfully.');
    }

    public function projects(Participant $participant)
    {
        $projects = $participant->projects;
        return view('participants.projects', compact('participant', 'projects'));
    }
}