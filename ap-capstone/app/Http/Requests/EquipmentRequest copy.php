<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $id = $this->route('equipment')?->id; // for unique update
        return [
            'facility_id' => 'required|exists:facilities,id',
            'name' => 'required|string|max:255',
            'capabilities' => 'nullable|array',
            'description' => 'nullable|string',
            'inventory_code' => 'required|string|max:255|unique:equipment,inventory_code' . ($id ? ",$id" : ""),
            'usage_domain' => 'nullable|string|max:100',
            'support_phase' => 'nullable|string|max:100',
        ];
    }
}
