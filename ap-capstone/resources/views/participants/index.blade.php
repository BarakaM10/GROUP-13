@extends('layouts.app')

@section('title', 'Participants')

@section('content')
    <h1>Participants</h1>
    <a href="{{ route('participants.create') }}" class="btn btn-primary">Create Participant</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->FullName }}</td>
                    <td>{{ $participant->Email }}</td>
                    <td>
                        <a href="{{ route('participants.show', $participant) }}" class="btn btn-info">View</a>
                        <a href="{{ route('participants.edit', $participant) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('participants.destroy', $participant) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $participants->links() }}
@endsection