@extends('layouts.app')

@section('title', 'Create Service')

@section('content')
    <h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Facility</label>
            <select name="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="Name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="Category" class="form-control">
        </div>
        <div class="mb-3">
            <label>Skill Type</label>
            <input type="text" name="SkillType" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

