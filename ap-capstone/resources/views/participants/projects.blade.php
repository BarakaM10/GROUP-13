@extends('layouts.app')

@section('content')
    <h1>Projects for Participant: {{ $participant->full_name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->project->id }}</td>
                    <td>{{ $project->project->title }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project->project) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection