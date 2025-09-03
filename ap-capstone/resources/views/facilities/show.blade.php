@extends('layouts.app')

@section('title', 'Facility Details')

@section('content')
    <h1>{{ $facility->Name }}</h1>
    <p>Location: {{ $facility->Location }}</p>
    <p>Description: {{ $facility->Description }}</p>
    <p>Partner: {{ $facility->PartnerOrganization }}</p>
    <p>Type: {{ $facility->FacilityType }}</p>
    <p>Capabilities: {{ $facility->Capabilities }}</p>
    <!-- List related -->
    <h2>Services</h2>
    <ul>
        @foreach($facility->services as $service)
            <li>{{ $service->Name }}</li>
        @endforeach
    </ul>
    <h2>Equipment</h2>
    <ul>
        @foreach($facility->equipment as $equipment)
            <li>{{ $equipment->Name }}</li>
        @endforeach
    </ul>
    <h2>Projects</h2>
    <ul>
        @foreach($facility->projects as $project)
            <li>{{ $project->Title }}</li>
        @endforeach
    </ul>
    <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Back</a>
@endsection