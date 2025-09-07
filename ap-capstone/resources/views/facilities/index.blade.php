@extends('layouts.app')

@section('title', 'Facilities')

@section('content')
    <h1>Facilities</h1>
    <a href="{{ route('facilities.create') }}" class="btn btn-primary mb-3">Create Facility</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>{{ $facility->FacilityId }}</td>
                    <td>{{ $facility->Name }}</td>
                    <td>{{ $facility->Location ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('facilities.show', $facility->FacilityId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('facilities.edit', $facility->FacilityId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('facilities.destroy', $facility->FacilityId) }}" method="POST" style="display:inline;">
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