<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Facility;
use Illuminate\Http\Request;

class EquipmentController 
{
    public function index(Request $request)
    {
        $query = Equipment::query();
        if ($request->filled('capabilities')) {
            $query->where('capabilities', 'like', '%'.$request->capabilities.'%');
        }
        if ($request->filled('usage_domain')) {
            $query->where('usage_domain', $request->usage_domain);
        }
        $equipment = $query->get();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('equipment.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'name' => 'required|string|max:255',
            'capabilities' => 'nullable|string',
            'description' => 'nullable|string',
            'inventory_code' => 'nullable|string|max:255',
            'usage_domain' => 'nullable|in:' . implode(',', Equipment::USAGE_DOMAINS),
            'support_phase' => 'nullable|in:' . implode(',', Equipment::SUPPORT_PHASES),
        ]);

        Equipment::create($validated);

        return redirect()->route('equipment.index')->with('success', 'Equipment created successfully.');
    }

    public function show(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    public function edit(Equipment $equipment)
    {
        $facilities = Facility::all();
        return view('equipment.edit', compact('equipment', 'facilities'));
    }

    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'name' => 'required|string|max:255',
            'capabilities' => 'nullable|string',
            'description' => 'nullable|string',
            'inventory_code' => 'nullable|string|max:255',
            'usage_domain' => 'nullable|in:' . implode(',', Equipment::USAGE_DOMAINS),
            'support_phase' => 'nullable|in:' . implode(',', Equipment::SUPPORT_PHASES),
        ]);

        $equipment->update($validated);

        return redirect()->route('equipment.show', $equipment)->with('success', 'Equipment updated successfully.');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully.');
    }
}