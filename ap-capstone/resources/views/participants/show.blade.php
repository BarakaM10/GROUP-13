@extends('layouts.app')

@section('content')
    <h1>{{ $participant->full_name }}</h1>
    <p><strong>Email:</strong> {{ $participant->email }}</p>
    <p><strong>Affiliation:</strong> {{ $participant->affiliation }}</p>
    <p><strong>Specialization:</strong> {{ $participant->specialization }}</p>
    <p><strong>Cross Skill Trained:</strong> {{ $participant->cross_skill_trained ? 'Yes' : 'No' }}</p>
    <p><strong>Institution:</strong> {{ $participant->institution }}</p>
    <a href="{{ route('participants.projects', $participant) }}" class="btn btn-info">View Projects</a>
    <a href="{{ route('participants.edit', $participant) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('participants.destroy', $participant) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection