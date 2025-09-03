@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content')
    <h1>Edit Equipment</h1>
    <form action="{{ route('equipment.update', $equipment) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Facility</label>
            <select name="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}" {{ $equipment->FacilityId == $facility->FacilityId ? 'selected' : '' }}>
                        {{ $facility->Name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" value="{{ $equipment->Name }}" required>
        </div>
        <div class="mb-3">
            <label>Capabilities</label>
            <input type="text" name="Capabilities" class="form-control" value="{{ $equipment->Capabilities }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control">{{ $equipment->Description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Inventory Code</label>
            <input type="text" name="InventoryCode" class="form-control" value="{{ $equipment->InventoryCode }}">
        </div>
        <div class="mb-3">
            <label>Usage Domain</label>
            <input type="text" name="UsageDomain" class="form-control" value="{{ $equipment->UsageDomain }}">
        </div>
        <div class="mb-3">
            <label>Support Phase</label>
            <input type="text" name="SupportPhase" class="form-control" value="{{ $equipment->SupportPhase }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
