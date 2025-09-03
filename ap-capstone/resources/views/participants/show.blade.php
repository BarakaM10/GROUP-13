@extends('layouts.app')

@section('title', 'Participant Details')

@section('content')
    <h1>{{ $participant->FullName }}</h1>
    <p>Email: {{ $participant->Email }}</p>
    <p>Affiliation: {{ $participant->Affiliation }}</p>
    <p>Specialization: {{ $participant->Specialization }}</p>
    <p>Cross-Skill Trained: {{ $participant->CrossSkillTrained ? 'Yes' : 'No' }}</p>
    <p>Institution: {{ $participant->Institution }}</p>
    <h2>Projects</h2>
    <ul>
        @foreach($participant->projects as $project)
            <li>{{ $project->Title }} ({{ $project->pivot->RoleOnProject }})</li>
        @endforeach
    </ul>
    <a href="{{ route('participants.index') }}" class="btn btn-secondary">Back</a>
@endsection