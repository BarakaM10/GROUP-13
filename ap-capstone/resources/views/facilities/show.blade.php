@extends('layouts.app')

@section('title', 'Facility Details')

@section('content')
    <h1>{{ $facility->Name }}</h1>
    <p><strong>Location:</strong> {{ $facility->Location }}</p>
    <p><strong>Description:</strong> {{ $facility->Description ?? 'None' }}</p>
    <p><strong>Capabilities:</strong> {{ $facility->Capabilities ?? 'None' }}</p>
    <h2>Related Services</h2>
    <ul>
        @if($facility->services->isEmpty())
            <li>None</li>
        @else
            @foreach($facility->services as $service)
                <li>{{ $service->Name }}</li>
            @endforeach
        @endif
    </ul>
    <h2>Related Equipment</h2>
    <ul>
        @if($facility->equipment->isEmpty())
            <li>None</li>
        @else
            @foreach($facility->equipment as $equipment)
                <li>{{ $equipment->Name }}</li>
            @endforeach
        @endif
    </ul>
    <h2>Related Projects</h2>
    <ul>
        @if($facility->projects->isEmpty())
            <li>None</li>
        @else
            @foreach($facility->projects as $project)
                <li>{{ $project->Title }}</li>
            @endforeach
        @endif
    </ul>
    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Back</a>
@endsection
