@extends('layouts.app')

@section('title', 'Participant Details')

@section('content')
    <h1>{{ $participant->FullName }}</h1>
    <p><strong>Email:</strong> {{ $participant->Email }}</p>
    <p><strong>Affiliation:</strong> {{ $participant->Affiliation ?? 'None' }}</p>
    <p><strong>Specialization:</strong> {{ $participant->Specialization ?? 'None' }}</p>
    <p><strong>Cross-Skill Trained:</strong> {{ $participant->CrossSkillTrained ? 'Yes' : 'No' }}</p>
    <p><strong>Institution:</strong> {{ $participant->Institution ?? 'None' }}</p>
    <h2>Projects</h2>
    <ul>
        @if($participant->projects->isEmpty())
            <li>None</li>
        @else
            @foreach($participant->projects as $project)
                <li>{{ $project->Title }} ({{ $project->pivot->RoleOnProject ?? 'N/A' }})</li>
            @endforeach
        @endif
    </ul>
    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Back</a>
@endsection