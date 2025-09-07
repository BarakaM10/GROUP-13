@extends('layouts.app')

@section('title', 'Create Outcome')

@section('content')
    <h1>Create Outcome</h1>
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
    <form action="{{ route('outcomes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="Title">Title</label>
            <input type="text" name="Title" id="Title" class="form-control" required value="{{ old('Title') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="ProjectId">Project</label>
            <select name="ProjectId" id="ProjectId" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->ProjectId }}">{{ $project->Title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description') }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="ArtifactLink">Upload Artifact (PDF, DOC, DOCX, JPG, PNG, max 2MB)</label>
            <input type="file" name="ArtifactLink" id="ArtifactLink" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
        </div>
        <br>
        <div class="form-group">
            <label for="OutcomeType">Outcome Type</label>
            <input type="text" name="OutcomeType" id="OutcomeType" class="form-control" value="{{ old('OutcomeType') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="QualityCertification">Quality Certification</label>
            <input type="text" name="QualityCertification" id="QualityCertification" class="form-control" value="{{ old('QualityCertification') }}">
        </div>
        <br>
        <div class="form-group">
            <label for="CommercializationStatus">Commercialization Status</label>
            <input type="text" name="CommercializationStatus" id="CommercializationStatus" class="form-control" value="{{ old('CommercializationStatus') }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('outcomes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection