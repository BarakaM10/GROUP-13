@extends('layouts.app')

@section('title', 'Edit Facility')

@section('content')
    <h1>Edit Facility</h1>
    <form action="{{ route('facilities.update', $facility->FacilityId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $facility->Name) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Location">Location</label>
            <input type="text" name="Location" id="Location" class="form-control" value="{{ old('Location', $facility->Location) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $facility->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="PartnerOrganization">Partner Organization</label>
            <input type="text" name="PartnerOrganization" id="PartnerOrganization" class="form-control" value="{{ old('PartnerOrganization', $facility->PartnerOrganization) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityType">Facility Type</label>
            <input type="text" name="FacilityType" id="FacilityType" class="form-control" value="{{ old('FacilityType', $facility->FacilityType) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="Capabilities">Capabilities</label>
            <textarea name="Capabilities" id="Capabilities" class="form-control">{{ old('Capabilities', $facility->Capabilities) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection