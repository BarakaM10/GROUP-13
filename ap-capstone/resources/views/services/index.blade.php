@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Create Service</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Facility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->ServiceId }}</td>
                    <td>{{ $service->Name }}</td>
                    <td>{{ $service->facility->Name ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('services.show', $service->ServiceId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('services.edit', $service->ServiceId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('services.destroy', $service->ServiceId) }}" method="POST" style="display:inline;">
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