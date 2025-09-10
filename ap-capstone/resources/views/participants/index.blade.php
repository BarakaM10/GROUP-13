@extends('layouts.app')

@section('content')
    <h1>Participants</h1>
    <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Create Participant</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Affiliation</th>
                <th>Specialization</th>
                <th>Institution</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $participant)
                <tr>
                    <td>{{ $participant->id }}</td>
                    <td>{{ $participant->full_name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->affiliation }}</td>
                    <td>{{ $participant->specialization }}</td>
                    <td>{{ $participant->institution }}</td>
                    <td>
                        <a href="{{ route('participants.show', $participant) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('participants.edit', $participant) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('participants.destroy', $participant) }}" method="POST" style="display: inline;">
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