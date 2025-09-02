<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\EquipmentRequest;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    use ApiResponse;
    public function index(Request $r)
    {
        $q = Equipment::query()->with('facility');
        if ($r->filled('facility_id'))
            $q->where('facility_id', $r->integer('facility_id'));
        if ($r->filled('capability'))
            $q->whereJsonContains('capabilities', $r->string('capability'));
        if ($r->filled('usage_domain'))
            $q->where('usage_domain', $r->string('usage_domain'));
        return $this->ok($q->latest('id')->paginate());
    }
    public function show(Equipment $equipment)
    {
        return $this->ok($equipment->load('facility'));
    }
    public function store(EquipmentRequest $req)
    {
        return $this->created(Equipment::create($req->validated()));
    }
    public function update(EquipmentRequest $req, Equipment $equipment)
    {
        $equipment->update($req->validated());
        return $this->ok($equipment);
    }
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return $this->ok(['deleted' => true]);
    }
}
