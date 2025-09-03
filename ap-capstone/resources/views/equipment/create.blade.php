@extends('layouts.app')

@section('title', 'Create Equipment')

@section('content')
    <h1>Create Equipment</h1>
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Facility</label>
            <select name="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Capabilities</label>
            <input type="text" name="Capabilities" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Inventory Code</label>
            <input type="text" name="InventoryCode" class="form-control">
        </div>
        <div class="mb-3">
            <label>Usage Domain</label>
            <input type="text" name="UsageDomain" class="form-control">
        </div>
        <div class="mb-3">
            <label>Support Phase</label>
            <input type="text" name="SupportPhase" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

