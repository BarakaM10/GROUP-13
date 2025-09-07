@extends('layouts.app')

@section('title', 'Create Facility')

@section('content')
    <h1>Create Facility</h1>
    <form action="{{ route('facilities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Location">Location</label>
            <input type="text" name="Location" id="Location" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="PartnerOrganization">Partner Organization</label>
            <input type="text" name="PartnerOrganization" id="PartnerOrganization" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityType">Facility Type</label>
            <input type="text" name="FacilityType" id="FacilityType" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="Capabilities">Capabilities</label>
            <textarea name="Capabilities" id="Capabilities" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection