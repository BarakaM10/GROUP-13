<?php
namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::paginate(10);
        return view('participants.index', compact('participants'));
    }

    public function show(Participant $participant)
    {
        return view('participants.show', compact('participant'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|email|unique:participants',
            'Affiliation' => 'nullable|string',
            'Specialization' => 'nullable|string',
             'CrossSkillTrained' => 'boolean',
            'Institution' => 'nullable|string',
        ]);
        Participant::create($validated);
        return redirect()->route('participants.index')->with('success', 'Participant created.');
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'FullName' => 'required|string|max:255',
            'Email' => 'required|email|unique:participants,Email,' . $participant->ParticipantId . ',ParticipantId',
            'Affiliation' => 'nullable|string',
            'Specialization' => 'nullable|string',
            'CrossSkillTrained' => 'boolean',
            'Institution' => 'nullable|string',
        ]);
        $participant->update($validated);
        return redirect()->route('participants.index')->with('success', 'Participant updated.');
    }
public function destroy(Participant $participant)
    {
        if ($participant->projects()->exists()) {
            return back()->with('error', 'Cannot delete participant with linked projects.');
        }
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant deleted.');
    }
};
