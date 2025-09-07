@extends('layouts.app')

@section('title', 'View Outcome')

@section('content')
    <h1>Outcome Details</h1>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <p><strong>ID:</strong> {{ $outcome->OutcomeId }}</p>
    <p><strong>Title:</strong> {{ $outcome->Title }}</p>
    <p><strong>Project:</strong> {{ $outcome->project->Title ?? 'None' }}</p>
    <p><strong>Description:</strong> {{ $outcome->Description ?? 'None' }}</p>
    @if($outcome->ArtifactLink)
        <p><strong>Artifact:</strong> <a href="{{ route('outcomes.download', $outcome->OutcomeId) }}"
                target="_blank">{{ basename($outcome->ArtifactLink) }}</a></p>
    @else
        <p><strong>Artifact:</strong> None</p>
    @endif
    <p><strong>Outcome Type:</strong> {{ $outcome->OutcomeType ?? 'None' }}</p>
    <p><strong>Quality Certification:</strong> {{ $outcome->QualityCertification ?? 'None' }}</p>
    <p><strong>Commercialization Status:</strong> {{ $outcome->CommercializationStatus ?? 'None' }}</p>

    <a href="{{ route('outcomes.index') }}" class="btn btn-secondary mt-3">Back</a>
@endsection