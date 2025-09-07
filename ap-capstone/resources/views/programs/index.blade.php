@extends('layouts.app')

@section('title', 'Programs')

@section('content')
    <h1>Programs</h1>
    <a href="{{ route('programs.create') }}" class="btn btn-primary mb-3">Create Program</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($programs as $program)
                <tr>
                    <td>{{ $program->ProgramId }}</td>
                    <td>{{ $program->Name }}</td>
                    <td>
                        <a href="{{ route('programs.show', $program->ProgramId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('programs.edit', $program->ProgramId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('programs.destroy', $program->ProgramId) }}" method="POST" style="display:inline;">
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