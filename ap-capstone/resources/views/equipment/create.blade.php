@extends('layouts.app')

@section('title', 'Create Equipment')

@section('content')
    <h1>Create Equipment</h1>
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityId">Facility</label>
            <select name="FacilityId" id="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Capabilities">Capabilities</label>
            <textarea name="Capabilities" id="Capabilities" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="InventoryCode">Inventory Code</label>
            <input type="text" name="InventoryCode" id="InventoryCode" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="UsageDomain">Usage Domain</label>
            <input type="text" name="UsageDomain" id="UsageDomain" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="SupportPhase">Support Phase</label>
            <input type="text" name="SupportPhase" id="SupportPhase" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection