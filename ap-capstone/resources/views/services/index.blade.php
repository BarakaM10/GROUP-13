@extends('layouts.app')

@section('content')
    <h1>Services</h1>
    <form method="GET" class="mb-3">
        <select name="category" class="form-control d-inline-block w-auto">
            <option value="">Filter by Category</option>
            @foreach (App\Models\Service::CATEGORIES as $category)
                <option value="{{ $category }}" @if(request('category') == $category) selected @endif>{{ $category }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">Create Service</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Skill Type</th>
                <th>Facility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->category }}</td>
                    <td>{{ $service->skill_type }}</td>
                    <td>{{ $service->facility->name }}</td>
                    <td>
                        <a href="{{ route('services.show', $service) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('services.edit', $service) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" style="display: inline;">
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