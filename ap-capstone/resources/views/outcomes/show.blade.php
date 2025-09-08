@extends('layouts.app')

@section('content')
    <h1>{{ $outcome->title }}</h1>
    <p><strong>Description:</strong> {{ $outcome->description }}</p>
    <p><strong>Outcome Type:</strong> {{ $outcome->outcome_type }}</p>
    <p><strong>Quality Certification:</strong> {{ $outcome->quality_certification }}</p>
    <p><strong>Commercialization Status:</strong> {{ $outcome->commercialization_status }}</p>
    <p><strong>Project:</strong> {{ $outcome->project->title }}</p>
    <p><strong>Artifact:</strong> 
        @if ($outcome->artifact_link)
            <a href="{{ asset('storage/' . $outcome->artifact_link) }}" download>Download</a>
        @else
            None
        @endif
    </p>
    <a href="{{ route('outcomes.edit', $outcome) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('outcomes.destroy', $outcome) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection