@extends('layouts.app')

@section('title', 'Service Details')

@section('content')
    <h1>{{ $service->Name }}</h1>
    <p><strong>Facility:</strong> {{ $service->facility->Name }}</p>
    <p><strong>Description:</strong> {{ $service->Description ?? 'None' }}</p>
    <p><strong>Category:</strong> {{ $service->Category ?? 'None' }}</p>
    <p><strong>Skill Type:</strong> {{ $service->SkillType ?? 'None' }}</p>
    <a href="{{ route('services.index') }}" class="btn btn-secondary">Back</a>
@endsection