@extends('layouts.app')

@section('content')
    <h1>{{ $facility->name }}</h1>
    <p><strong>Location:</strong> {{ $facility->location }}</p>
    <p><strong>Description:</strong> {{ $facility->description }}</p>
    <p><strong>Partner Organization:</strong> {{ $facility->partner_organization }}</p>
    <p><strong>Facility Type:</strong> {{ $facility->facility_type }}</p>
    <p><strong>Capabilities:</strong> {{ $facility->capabilities }}</p>
    <a href="{{ route('facilities.services', $facility) }}" class="btn btn-info">View Services</a>
    <a href="{{ route('facilities.equipment', $facility) }}" class="btn btn-info">View Equipment</a>
    <a href="{{ route('facilities.projects', $facility) }}" class="btn btn-info">View Projects</a>
    <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection