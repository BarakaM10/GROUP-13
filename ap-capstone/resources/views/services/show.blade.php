@extends('layouts.app')

@section('content')
    <h1>{{ $service->name }}</h1>
    <p><strong>Description:</strong> {{ $service->description }}</p>
    <p><strong>Category:</strong> {{ $service->category }}</p>
    <p><strong>Skill Type:</strong> {{ $service->skill_type }}</p>
    <p><strong>Facility:</strong> {{ $service->facility->name }}</p>
    <a href="{{ route('services.edit', $service) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('services.destroy', $service) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection