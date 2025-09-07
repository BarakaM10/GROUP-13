@extends('layouts.app')

@section('title', 'Edit Outcome')

@section('content')
    <h1>Edit Outcome</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('outcomes.update', $outcome->OutcomeId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" value="{{ old('Title', $outcome->Title) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="ProjectId">Project</label>
            <select name="ProjectId" id="ProjectId" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->ProjectId }}" {{ $project->ProjectId == $outcome->ProjectId ? 'selected' : '' }}>{{ $project->Title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $outcome->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="ArtifactLink">Upload New Artifact (PDF, DOC, DOCX, JPG, PNG, max 2MB)</label>
            <input type="file" name="ArtifactLink" id="ArtifactLink" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
            @if($outcome->ArtifactLink)
                <p>Current Artifact: <a href="{{ route('outcomes.download', $outcome->OutcomeId) }}" target="_blank">{{ basename($outcome->ArtifactLink) }}</a></p>
            @else
                <p>No artifact uploaded.</p>
            @endif
        </div>
        <br>
        <div class="form-group">
            <label for="OutcomeType">Outcome Type</label>
            <input type="text" name="OutcomeType" id="OutcomeType" class="form-control" value="{{ old('OutcomeType', $outcome->OutcomeType) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="QualityCertification">Quality Certification</label>
            <input type="text" name="QualityCertification" id="QualityCertification" class="form-control" value="{{ old('QualityCertification', $outcome->QualityCertification) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="CommercializationStatus">Commercialization Status</label>
            <input type="text" name="CommercializationStatus" id="CommercializationStatus" class="form-control" value="{{ old('CommercializationStatus', $outcome->CommercializationStatus) }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('outcomes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection