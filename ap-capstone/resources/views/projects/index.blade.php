@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Nature</th>
                <th>Prototype Stage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->nature_of_project }}</td>
                    <td>{{ $project->prototype_stage }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection