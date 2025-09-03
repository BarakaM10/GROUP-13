@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
    <h1>{{ $service->Name }}</h1>
    <p>Facility: {{ $service->facility->Name }}</p>
    <p>Description: {{ $service->Description }}</p>
    <p>Category: {{ $service->Category }}</p>
    <p>Skill Type: {{ $service->SkillType }}</p>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
@endsection
