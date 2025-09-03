@extends('layouts.app')

@section('title', 'Create Facility')

@section('content')
    <h1>Create Facility</h1>
    <form action="{{ route('facilities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Location</label>
            <input type="text" name="Location" class="form-control">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Partner Organization</label>
            <input type="text" name="PartnerOrganization" class="form-control">
        </div>
        <div class="mb-3">
            <label>Facility Type</label>
            <input type="text" name="FacilityType" class="form-control">
        </div>
        <div class="mb-3">
            <label>Capabilities</label>
            <input type="text" name="Capabilities" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection