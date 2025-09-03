@extends('layouts.app')

@section('title', 'Outcome Details')

@section('content')
    <h1>{{ $outcome->Title }}</h1>
    <p>Project: {{ $outcome->project->Title }}</p>
    <p>Description: {{ $outcome->Description }}</p>
    <p>Outcome Type: {{ $outcome->OutcomeType }}</p>
    <p>Quality Certification: {{ $outcome->QualityCertification }}</p>
    <p>Commercialization Status: {{ $outcome->CommercializationStatus }}</p>
    <a href="{{ route('outcomes.index') }}" class="btn btn-secondary">Back</a>
@endsection