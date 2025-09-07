@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="ProgramId">Program</label>
            <select name="ProgramId" id="ProgramId" class="form-control" required>
                @foreach($programs as $program)
                    <option value="{{ $program->ProgramId }}">{{ $program->Name }}</option>
                @endforeach
            </select>
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
            <label for="NatureOfProject">Nature of Project</label>
            <input type="text" name="NatureOfProject" id="NatureOfProject" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="InnovationFocus">Innovation Focus</label>
            <input type="text" name="InnovationFocus" id="InnovationFocus" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="PrototypeStage">Prototype Stage</label>
            <input type="text" name="PrototypeStage" id="PrototypeStage" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="TestingRequirements">Testing Requirements</label>
            <input type="text" name="TestingRequirements" id="TestingRequirements" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="CommercializationPlan">Commercialization Plan</label>
            <textarea name="CommercializationPlan" id="CommercializationPlan" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection