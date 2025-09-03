<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $type = $request->query('type');
        $partner = $request->query('partner');
        $capability = $request->query('capability');

        $facilities = Facility::when($search, fn($q, $s) => $q->where('Name', 'like', "%{$s}%"))
            ->when($type, fn($q, $t) => $q->where('FacilityType', $t))
            ->when($partner, fn($q, $p) => $q->where('PartnerOrganization', $p))
            ->when($capability, fn($q, $c) => $q->where('Capabilities', 'like', "%{$c}%"))
            ->paginate(10);

        return view('facilities.index', compact('facilities'));
    }

    public function show(Facility $facility)
    {
        return view('facilities.show', compact('facility'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Location' => 'nullable|string',
            'Description' => 'nullable|text',
            'PartnerOrganization' => 'nullable|string',
            'FacilityType' => 'nullable|string',
            'Capabilities' => 'nullable|string',
        ]);
        Facility::create($validated);
        return redirect()->route('facilities.index')->with('success', 'Facility created.');
    }

    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Location' => 'nullable|string',
            'Description' => 'nullable|text',
            'PartnerOrganization' => 'nullable|string',
            'FacilityType' => 'nullable|string',
            'Capabilities' => 'nullable|string',
        ]);
        $facility->update($validated);
        return redirect()->route('facilities.index')->with('success', 'Facility updated.');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->projects()->exists() || $facility->services()->exists() || $facility->equipment()->exists()) {
            return back()->with('error', 'Cannot delete facility with linked records.');
        }
        $facility->delete();
        return redirect()->route('facilities.index')->with('success', 'Facility deleted.');
    }
}
