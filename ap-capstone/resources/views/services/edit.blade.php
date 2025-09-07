@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service->ServiceId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $service->Name) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityId">Facility</label>
            <select name="FacilityId" id="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}" {{ $facility->FacilityId == $service->FacilityId ? 'selected' : '' }}>{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $service->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Category">Category</label>
            <input type="text" name="Category" id="Category" class="form-control" value="{{ old('Category', $service->Category) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="SkillType">Skill Type</label>
            <input type="text" name="SkillType" id="SkillType" class="form-control" value="{{ old('SkillType', $service->SkillType) }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection