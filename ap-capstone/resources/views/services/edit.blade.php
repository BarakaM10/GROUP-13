@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Facility</label>
            <select name="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}" {{ $service->FacilityId == $facility->FacilityId ? 'selected' : '' }}>
                        {{ $facility->Name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" value="{{ $service->Name }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control">{{ $service->Description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="Category" class="form-control" value="{{ $service->Category }}">
        </div>
        <div class="mb-3">
            <label>Skill Type</label>
            <input type="text" name="SkillType" class="form-control" value="{{ $service->SkillType }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
