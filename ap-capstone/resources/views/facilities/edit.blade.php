@extends('layouts.app')

@section('content')
    <h1>Edit Facility</h1>
    <form action="{{ route('facilities.update', $facility) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $facility->name }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $facility->location }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $facility->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="partner_organization" class="form-label">Partner Organization</label>
            <input type="text" name="partner_organization" id="partner_organization" class="form-control" value="{{ $facility->partner_organization }}">
        </div>
        <div class="mb-3">
            <label for="facility_type" class="form-label">Facility Type</label>
            <select name="facility_type" id="facility_type" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Facility::FACILITY_TYPES as $type)
                    <option value="{{ $type }}" @if($facility->facility_type == $type) selected @endif>{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="capabilities" class="form-label">Capabilities</label>
            <textarea name="capabilities" id="capabilities" class="form-control">{{ $facility->capabilities }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection