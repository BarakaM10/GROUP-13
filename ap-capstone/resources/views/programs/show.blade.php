@extends('layouts.app')

@section('content')
    <h1>{{ $program->name }}</h1>
    <p><strong>Description:</strong> {{ $program->description }}</p>
    <p><strong>National Alignment:</strong> {{ $program->national_alignment }}</p>
    <p><strong>Focus Areas:</strong> {{ $program->focus_areas }}</p>
    <p><strong>Phases:</strong> {{ $program->phases }}</p>
    <a href="{{ route('programs.projects', $program) }}" class="btn btn-info">View Projects</a>
    <a href="{{ route('programs.edit', $program) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('programs.destroy', $program) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection