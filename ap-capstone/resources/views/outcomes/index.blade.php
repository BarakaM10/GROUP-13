@extends('layouts.app')

@section('title', 'Outcomes')

@section('content')
    <h1>Outcomes</h1>
    <a href="{{ route('outcomes.create') }}" class="btn btn-primary">Create Outcome</a>
    <form method="GET" class="mt-3">
        <div class="row">
            <div class="col">
                <select name="project_id" class="form-control">
                    <option value="">All Projects</option>
                    @foreach(\App\Models\Project::all() as $project)
                        <option value="{{ $project->ProjectId }}" {{ request('project_id') == $project->ProjectId ? 'selected' : '' }}>
                            {{ $project->Title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Project</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->Title }}</td>
                    <td>{{ $outcome->project->Title }}</td>
                    <td>
                        <a href="{{ route('outcomes.show', $outcome) }}" class="btn btn-info">View</a>
                        <a href="{{ route('outcomes.edit', $outcome) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('outcomes.destroy', $outcome) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $outcomes->links() }}
@endsection