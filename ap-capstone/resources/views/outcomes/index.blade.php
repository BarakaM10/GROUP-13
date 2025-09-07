@extends('layouts.app')

@section('title', 'Outcomes')

@section('content')
    <h1>Outcomes</h1>
    <a href="{{ route('outcomes.create') }}" class="btn btn-primary mb-3">Create Outcome</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->OutcomeId }}</td>
                    <td>{{ $outcome->Title }}</td>
                    <td>{{ $outcome->project->Title ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('outcomes.show', $outcome->OutcomeId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('outcomes.edit', $outcome->OutcomeId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('outcomes.destroy', $outcome->OutcomeId) }}" method="POST" style="display:inline;">
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