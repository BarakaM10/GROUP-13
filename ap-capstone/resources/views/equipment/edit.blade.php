@extends('layouts.app')

@section('title', 'Edit Equipment')

@section('content')
    <h1>Edit Equipment</h1>
    <form action="{{ route('equipment.update', $equipment->EquipmentId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $equipment->Name) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityId">Facility</label>
            <select name="FacilityId" id="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}" {{ $facility->FacilityId == $equipment->FacilityId ? 'selected' : '' }}>{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Capabilities">Capabilities</label>
            <textarea name="Capabilities" id="Capabilities" class="form-control">{{ old('Capabilities', $equipment->Capabilities) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $equipment->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="InventoryCode">Inventory Code</label>
            <input type="text" name="InventoryCode" id="InventoryCode" class="form-control" value="{{ old('InventoryCode', $equipment->InventoryCode) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="UsageDomain">Usage Domain</label>
            <input type="text" name="UsageDomain" id="UsageDomain" class="form-control" value="{{ old('UsageDomain', $equipment->UsageDomain) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="SupportPhase">Support Phase</label>
            <input type="text" name="SupportPhase" id="SupportPhase" class="form-control" value="{{ old('SupportPhase', $equipment->SupportPhase) }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
