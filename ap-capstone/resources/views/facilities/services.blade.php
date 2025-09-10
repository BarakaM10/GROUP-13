@extends('layouts.app')

@section('content')
    <h1>Services for Facility: {{ $facility->name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category }}</td>
                    <td>
                        <a href="{{ route('services.show', $service) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection