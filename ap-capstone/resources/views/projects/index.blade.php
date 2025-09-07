@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Program</th>
                <th>Facility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->ProjectId }}</td>
                    <td>{{ $project->Title }}</td>
                    <td>{{ $project->program->Name ?? 'None' }}</td>
                    <td>{{ $project->facility->Name ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->ProjectId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('projects.edit', $project->ProjectId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('projects.destroy', $project->ProjectId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection