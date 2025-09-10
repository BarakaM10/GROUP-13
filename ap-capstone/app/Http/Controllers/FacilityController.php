<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController
{
    public function index(Request $request)
    {
        $query = Facility::query();
        if ($request->filled('facility_type')) {
            $query->where('facility_type', $request->facility_type);
        }
        if ($request->filled('partner_organization')) {
            $query->where('partner_organization', 'like', '%'.$request->partner_organization.'%');
        }
        if ($request->filled('capabilities')) {
            $query->where('capabilities', 'like', '%'.$request->capabilities.'%');
        }
        $facilities = $query->get();
        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        return view('facilities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'partner_organization' => 'nullable|string|max:255',
            'facility_type' => 'nullable|in:' . implode(',', Facility::FACILITY_TYPES),
            'capabilities' => 'nullable|string',
        ]);

        Facility::create($validated);

        return redirect()->route('facilities.index')->with('success', 'Facility created successfully.');
    }

    public function show(Facility $facility)
    {
        return view('facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        return view('facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'partner_organization' => 'nullable|string|max:255',
            'facility_type' => 'nullable|in:' . implode(',', Facility::FACILITY_TYPES),
            'capabilities' => 'nullable|string',
        ]);

        $facility->update($validated);

        return redirect()->route('facilities.show', $facility)->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->projects()->count() > 0 || $facility->services()->count() > 0 || $facility->equipment()->count() > 0) {
            return back()->with('error', 'Cannot delete facility with linked records.');
        }
        $facility->delete();

        return redirect()->route('facilities.index')->with('success', 'Facility deleted successfully.');
    }

    public function services(Facility $facility)
    {
        $services = $facility->services;
        return view('facilities.services', compact('facility', 'services'));
    }

    public function equipment(Facility $facility)
    {
        $equipment = $facility->equipment;
        return view('facilities.equipment', compact('facility', 'equipment'));
    }

    public function projects(Facility $facility)
    {
        $projects = $facility->projects;
        return view('facilities.projects', compact('facility', 'projects'));
    }
}