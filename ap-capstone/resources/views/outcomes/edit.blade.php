@extends('layouts.app')

@section('title', 'Edit Outcome')

@section('content')
    <h1>Edit Outcome</h1>
    <form action="{{ route('outcomes.update', $outcome) }}" method="POST">

    <form action="{{ route('outcomes.update', $outcome) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Project</label>
            <select name="ProjectId" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->ProjectId }}" {{ $outcome->ProjectId == $project->ProjectId ? 'selected' : '' }}>
                        {{ $project->Title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" value="{{ $outcome->Title }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control">{{ $outcome->Description }}</textarea>
        </div>
        <div class="mb-3">

            <label>Artifact File</label>
            <input type="file" name="ArtifactLink" class="form-control">
            @if($outcome->ArtifactLink)
                <p>Current: {{ $outcome->ArtifactLink }}</p>
            @endif
        </div>
        <div class="mb-3">
            <label>Outcome Type</label>
            <input type="text" name="OutcomeType" class="form-control" value="{{ $outcome->OutcomeType }}">
        </div>
        <div class="mb-3">
            <label>Quality Certification</label>
            <input type="text" name="QualityCertification" class="form-control" value="{{ $outcome->QualityCertification }}">
        </div>
        <div class="mb-3">
            <label>Commercialization Status</label>
            <input type="text" name="CommercializationStatus" class="form-control" value="{{ $outcome->CommercializationStatus }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@endsection
