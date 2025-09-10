<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Facility;
use Illuminate\Http\Request;

class ServiceController
{
    public function index(Request $request)
    {
        $query = Service::query();
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        $services = $query->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('services.create', compact('facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|in:' . implode(',', Service::CATEGORIES),
            'skill_type' => 'nullable|in:' . implode(',', Service::SKILL_TYPES),
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $facilities = Facility::all();
        return view('services.edit', compact('service', 'facilities'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'facility_id' => 'required|exists:facilities,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|in:' . implode(',', Service::CATEGORIES),
            'skill_type' => 'nullable|in:' . implode(',', Service::SKILL_TYPES),
        ]);

        $service->update($validated);

        return redirect()->route('services.show', $service)->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}