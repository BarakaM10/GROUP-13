@extends('layouts.app')

@section('title', 'Create Outcome')

@section('content')
    <h1>Create Outcome</h1>
    <form action="{{ route('outcomes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Project</label>
            <select name="ProjectId" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->ProjectId }}">{{ $project->Title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Artifact File</label>
            <input type="file" name="ArtifactLink" class="form-control">
        </div>
        <div class="mb-3">
            <label>Outcome Type</label>
            <input type="text" name="OutcomeType" class="form-control">
        </div>
        <div class="mb-3">
            <label>Quality Certification</label>
            <input type="text" name="QualityCertification" class="form-control">
        </div>
        <div class="mb-3">
            <label>Commercialization Status</label>
            <input type="text" name="CommercializationStatus" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
