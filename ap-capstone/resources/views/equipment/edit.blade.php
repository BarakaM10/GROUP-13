@extends('layouts.app')

@section('content')
    <h1>Edit Equipment</h1>
    <form action="{{ route('equipment.update', $equipment) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility</label>
            <select name="facility_id" id="facility_id" class="form-control" required>
                <option value="">Select Facility</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}" @if($equipment->facility_id == $facility->id) selected @endif>{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $equipment->name }}" required>
        </div>
        <div class="mb-3">
            <label for="capabilities" class="form-label">Capabilities</label>
            <textarea name="capabilities" id="capabilities" class="form-control">{{ $equipment->capabilities }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $equipment->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="inventory_code" class="form-label">Inventory Code</label>
            <input type="text" name="inventory_code" id="inventory_code" class="form-control" value="{{ $equipment->inventory_code }}">
        </div>
        <div class="mb-3">
            <label for="usage_domain" class="form-label">Usage Domain</label>
            <select name="usage_domain" id="usage_domain" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Equipment::USAGE_DOMAINS as $domain)
                    <option value="{{ $domain }}" @if($equipment->usage_domain == $domain) selected @endif>{{ $domain }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="support_phase" class="form-label">Support Phase</label>
            <select name="support_phase" id="support_phase" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Equipment::SUPPORT_PHASES as $phase)
                    <option value="{{ $phase }}" @if($equipment->support_phase == $phase) selected @endif>{{ $phase }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection