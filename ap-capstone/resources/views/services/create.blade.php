@extends('layouts.app')

@section('title', 'Create Service')

@section('content')
    <h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityId">Facility</label>
            <select name="FacilityId" id="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}">{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="Category">Category</label>
            <input type="text" name="Category" id="Category" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="SkillType">Skill Type</label>
            <input type="text" name="SkillType" id="SkillType" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection