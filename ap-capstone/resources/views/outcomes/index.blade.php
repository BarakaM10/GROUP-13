@extends('layouts.app')

@section('content')
    <h1>Outcomes</h1>
    <a href="{{ route('outcomes.create') }}" class="btn btn-primary mb-3">Create Outcome</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Commercialization Status</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->id }}</td>
                    <td>{{ $outcome->title }}</td>
                    <td>{{ $outcome->outcome_type }}</td>
                    <td>{{ $outcome->commercialization_status }}</td>
                    <td>{{ $outcome->project->title }}</td>
                    <td>
                        <a href="{{ route('outcomes.show', $outcome) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('outcomes.edit', $outcome) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('outcomes.destroy', $outcome) }}" method="POST" style="display: inline;">
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