@extends('layouts.app')

@section('content')
    <h1>Create Facility</h1>
    <form action="{{ route('facilities.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="partner_organization" class="form-label">Partner Organization</label>
            <input type="text" name="partner_organization" id="partner_organization" class="form-control">
        </div>
        <div class="mb-3">
            <label for="facility_type" class="form-label">Facility Type</label>
            <select name="facility_type" id="facility_type" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Facility::FACILITY_TYPES as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="capabilities" class="form-label">Capabilities</label>
            <textarea name="capabilities" id="capabilities" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection