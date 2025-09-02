<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\FacilityRequest;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    use ApiResponse;
    public function index(Request $r)
    {
        $q = Facility::query();
        if ($r->filled('type'))
            $q->where('facility_type', $r->string('type'));
        if ($r->filled('partner'))
            $q->where('partner_organization', $r->string('partner'));
        if ($r->filled('capability'))
            $q->whereJsonContains('capabilities', $r->string('capability'));
        return $this->ok($q->latest('id')->paginate());
    }
    public function show(Facility $facility)
    {
        return $this->ok($facility->load(['services', 'equipment', 'projects']));
    }
    public function store(FacilityRequest $req)
    {
        return $this->created(Facility::create($req->validated()));
    }
    public function update(FacilityRequest $req, Facility $facility)
    {
        $facility->update($req->validated());
        return $this->ok($facility);
    }
    public function destroy(Facility $facility)
    {
        $facility->delete();
        return $this->ok(['deleted' => true]);
    }
}
