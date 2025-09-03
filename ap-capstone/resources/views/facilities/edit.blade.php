@extends('layouts.app')

@section('title', 'Edit Facility')

@section('content')
    <h1>Edit Facility</h1>
    <form action="{{ route('facilities.update', $facility) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" value="{{ $facility->Name }}" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="Location" class="form-control" value="{{ $facility->Location }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control">{{ $facility->Description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Partner Organization</label>
            <input type="text" name="PartnerOrganization" class="form-control" value="{{ $facility->PartnerOrganization }}">
        </div>
        <div class="mb-3">
            <label>Facility Type</label>
            <input type="text" name="FacilityType" class="form-control" value="{{ $facility->FacilityType }}">
        </div>
        <div class="mb-3">
            <label>Capabilities</label>
            <input type="text" name="Capabilities" class="form-control" value="{{ $facility->Capabilities }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection