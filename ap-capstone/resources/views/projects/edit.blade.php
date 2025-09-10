@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="program_id" class="form-label">Program</label>
            <select name="program_id" id="program_id" class="form-control" required>
                <option value="">Select Program</option>
                @foreach ($programs as $program)
                    <option value="{{ $program->id }}" @if($project->program_id == $program->id) selected @endif>{{ $program->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility</label>
            <select name="facility_id" id="facility_id" class="form-control" required>
                <option value="">Select Facility</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}" @if($project->facility_id == $facility->id) selected @endif>{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3">
            <label for="nature_of_project" class="form-label">Nature of Project</label>
            <select name="nature_of_project" id="nature_of_project" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Project::NATURES as $nature)
                    <option value="{{ $nature }}" @if($project->nature_of_project == $nature) selected @endif>{{ $nature }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="innovation_focus" class="form-label">Innovation Focus</label>
            <input type="text" name="innovation_focus" id="innovation_focus" class="form-control" value="{{ $project->innovation_focus }}">
        </div>
        <div class="mb-3">
            <label for="prototype_stage" class="form-label">Prototype Stage</label>
            <select name="prototype_stage" id="prototype_stage" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Project::PROTOTYPE_STAGES as $stage)
                    <option value="{{ $stage }}" @if($project->prototype_stage == $stage) selected @endif>{{ $stage }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="testing_requirements" class="form-label">Testing Requirements</label>
            <textarea name="testing_requirements" id="testing_requirements" class="form-control">{{ $project->testing_requirements }}</textarea>
        </div>
        <div class="mb-3">
            <label for="commercialization_plan" class="form-label">Commercialization Plan</label>
            <textarea name="commercialization_plan" id="commercialization_plan" class="form-control">{{ $project->commercialization_plan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection