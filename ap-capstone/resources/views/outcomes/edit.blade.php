@extends('layouts.app')

@section('content')
    <h1>Edit Outcome</h1>
    <form action="{{ route('outcomes.update', $outcome) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="project_id" class="form-label">Project</label>
            <select name="project_id" id="project_id" class="form-control" required>
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" @if($outcome->project_id == $project->id) selected @endif>{{ $project->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $outcome->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $outcome->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="artifact" class="form-label">Artifact (current: {{ $outcome->artifact_link ? 'Uploaded' : 'None' }})</label>
            <input type="file" name="artifact" id="artifact" class="form-control">
        </div>
        <div class="mb-3">
            <label for="outcome_type" class="form-label">Outcome Type</label>
            <select name="outcome_type" id="outcome_type" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Outcome::OUTCOME_TYPES as $type)
                    <option value="{{ $type }}" @if($outcome->outcome_type == $type) selected @endif>{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quality_certification" class="form-label">Quality Certification</label>
            <input type="text" name="quality_certification" id="quality_certification" class="form-control" value="{{ $outcome->quality_certification }}">
        </div>
        <div class="mb-3">
            <label for="commercialization_status" class="form-label">Commercialization Status</label>
            <select name="commercialization_status" id="commercialization_status" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Outcome::COMMERCIALIZATION_STATUSES as $status)
                    <option value="{{ $status }}" @if($outcome->commercialization_status == $status) selected @endif>{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection