@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->ProjectId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" value="{{ old('Title', $project->Title) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="ProgramId">Program</label>
            <select name="ProgramId" id="ProgramId" class="form-control" required>
                @foreach($programs as $program)
                    <option value="{{ $program->ProgramId }}" {{ $program->ProgramId == $project->ProgramId ? 'selected' : '' }}>{{ $program->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="FacilityId">Facility</label>
            <select name="FacilityId" id="FacilityId" class="form-control" required>
                @foreach($facilities as $facility)
                    <option value="{{ $facility->FacilityId }}" {{ $facility->FacilityId == $project->FacilityId ? 'selected' : '' }}>{{ $facility->Name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="NatureOfProject">Nature of Project</label>
            <input type="text" name="NatureOfProject" id="NatureOfProject" class="form-control" value="{{ old('NatureOfProject', $project->NatureOfProject) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $project->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="InnovationFocus">Innovation Focus</label>
            <input type="text" name="InnovationFocus" id="InnovationFocus" class="form-control" value="{{ old('InnovationFocus', $project->InnovationFocus) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="PrototypeStage">Prototype Stage</label>
            <input type="text" name="PrototypeStage" id="PrototypeStage" class="form-control" value="{{ old('PrototypeStage', $project->PrototypeStage) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="TestingRequirements">Testing Requirements</label>
            <input type="text" name="TestingRequirements" id="TestingRequirements" class="form-control" value="{{ old('TestingRequirements', $project->TestingRequirements) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="CommercializationPlan">Commercialization Plan</label>
            <textarea name="CommercializationPlan" id="CommercializationPlan" class="form-control">{{ old('CommercializationPlan', $project->CommercializationPlan) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection