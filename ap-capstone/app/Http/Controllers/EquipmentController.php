<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Facility;
use App\Models\Project;
use Illuminate\Http\Request;

class EquipmentController
{
    public function index(Request $request)
    {
        $facilityId = $request->query('facility_id');
        $capability = $request->query('capability');
        $domain = $request->query('domain');

        $equipment = Equipment::when($facilityId, fn($q, $f) => $q->where('FacilityId', $f))
            ->when($capability, fn($q, $c) => $q->where('Capabilities', 'like', "%{$c}%"))
            ->when($domain, fn($q, $d) => $q->where('UsageDomain', 'like', "%{$d}%"))
            ->with('facility')
            ->paginate(10);

        return view('equipment.index', compact('equipment'));
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    public function create()
    {
       $facilities = Facility::all();
        return view('equipment.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Name' => 'required|string|max:255',
            'Capabilities' => 'nullable|string',
            'Description' => 'nullable|string',
            'InventoryCode' => 'nullable|string',
            'UsageDomain' => 'nullable|string',
            'SupportPhase' => 'nullable|string',
        ]);
        Equipment::create($validated);
        return redirect()->route('equipment.index')->with('success', 'Equipment created.');
    }

    public function edit(Equipment $equipment)
    {
        $facilities = Facility::all();
        return view('equipment.edit', compact('equipment', 'facilities'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Name' => 'required|string|max:255',
            'Capabilities' => 'nullable|string',
            'Description' => 'nullable|string',
            'InventoryCode' => 'nullable|string',
            'UsageDomain' => 'nullable|string',
           'SupportPhase' => 'nullable|string',
        ]);
        $equipment->update($validated);
        return redirect()->route('equipment.index')->with('success', 'Equipment updated.');
    }

    public function destroy(Equipment $equipment)
    {
        $projects = Project::where('FacilityId', $equipment->FacilityId)->exists();
        if ($projects) {
            return back()->with('error', 'Cannot delete equipment tied to active projects.');
        }
        $equipment->delete();
        return redirect()->route('equipment.index')->with('success', 'Equipment deleted.');
    }
};

