@extends('layouts.app')

@section('content')
    <h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility</label>
            <select name="facility_id" id="facility_id" class="form-control" required>
                <option value="">Select Facility</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="category" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Service::CATEGORIES as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="skill_type" class="form-label">Skill Type</label>
            <select name="skill_type" id="skill_type" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Service::SKILL_TYPES as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection