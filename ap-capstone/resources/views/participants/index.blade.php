@extends('layouts.app')

@section('title', 'Participants')

@section('content')
    <h1>Participants</h1>
    <a href="{{ route('participants.create') }}" class="btn btn-primary mb-3">Create Participant</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->ParticipantId }}</td>
                    <td>{{ $participant->FullName }}</td>
                    <td>{{ $participant->Email }}</td>
                    <td>
                        <a href="{{ route('participants.show', $participant->ParticipantId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('participants.edit', $participant->ParticipantId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('participants.destroy', $participant->ParticipantId) }}" method="POST" style="display:inline;">
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