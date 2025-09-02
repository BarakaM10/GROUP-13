<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Facility;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $facilityId = $request->query('facility_id');
        $category = $request->query('category');

        $services = Service::when($facilityId, fn($q, $f) => $q->where('FacilityId', $f))
            ->when($category, fn($q, $c) => $q->where('Category', 'like', "%{$c}%"))
            ->with('facility')
            ->paginate(10);

        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function create()
    {
        $facilities = Facility::all();
        return view('services.create', compact('facilities'));
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|text',
            'Category' => 'nullable|string',
            'SkillType' => 'nullable|string',
        ]);
        Service::create($validated);
        return redirect()->route('services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        $facilities = Facility::all();
        return view('services.edit', compact('service', 'facilities'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'FacilityId' => 'required|exists:facilities,FacilityId',
            'Name' => 'required|string|max:255',
            'Description' => 'nullable|text',
            'Category' => 'nullable|string',
            'SkillType' => 'nullable|string',
        ]);
        $service->update($validated);
        return redirect()->route('services.index')->with('success', 'Service updated.');
    }

     public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted.');
    }
};
