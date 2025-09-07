@extends('layouts.app')

@section('title', 'Program Details')

@section('content')
    <h1>Program Details</h1>
    <p><strong>ID:</strong> {{ $program->ProgramId }}</p>
    <p><strong>Name:</strong> {{ $program->Name }}</p>
    <p><strong>Description:</strong> {{ $program->Description ?? 'None' }}</p>
    <p><strong>National Alignment:</strong> {{ $program->NationalAlignment ?? 'None' }}</p>
    <p><strong>Focus Areas:</strong> {{ $program->FocusAreas ?? 'None' }}</p>
    <p><strong>Phases:</strong> {{ $program->Phases ?? 'None' }}</p>
    <h2>Related Projects</h2>
    <ul>
        @if($program->projects->isEmpty())
            <li>None</li>
        @else
            @foreach($program->projects as $project)
                <li>{{ $project->Title }}</li>
            @endforeach
        @endif
    </ul>
    <a href="{{ route('programs.index') }}" class="btn btn-secondary">Back</a>
@endsection