@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <h1>{{ $project->Title }}</h1>
    <p><strong>Program:</strong> {{ $project->program->Name }}</p>
    <p><strong>Facility:</strong> {{ $project->facility->Name }}</p>
    <p><strong>Nature:</strong> {{ $project->NatureOfProject ?? 'None' }}</p>
    <p><strong>Description:</strong> {{ $project->Description ?? 'None' }}</p>
    <p><strong>Innovation Focus:</strong> {{ $project->InnovationFocus ?? 'None' }}</p>
    <p><strong>Prototype Stage:</strong> {{ $project->PrototypeStage ?? 'None' }}</p>
    <p><strong>Testing Requirements:</strong> {{ $project->TestingRequirements ?? 'None' }}</p>
    <p><strong>Commercialization Plan:</strong> {{ $project->CommercializationPlan ?? 'None' }}</p>
    <h2>Participants</h2>
    <ul>
        @if($project->participants->isEmpty())
            <li>None</li>
        @else
            @foreach($project->participants as $participant)
                <li>{{ $participant->FullName }} ({{ $participant->pivot->RoleOnProject ?? 'N/A' }})</li>
            @endforeach
        @endif
    </ul>
    <h2>Outcomes</h2>
    <ul>
        @if($project->outcomes->isEmpty())
            <li>None</li>
        @else
            @foreach($project->outcomes as $outcome)
                <li>{{ $outcome->Title }}</li>
            @endforeach
        @endif
    </ul>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
@endsection