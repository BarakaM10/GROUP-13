@extends('layouts.app')

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
            @foreach ($programs as $program)
                <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->name }}</td>
                    <td>
                        <a href="{{ route('programs.show', $program) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('programs.edit', $program) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('programs.destroy', $program) }}" method="POST" style="display: inline;">
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