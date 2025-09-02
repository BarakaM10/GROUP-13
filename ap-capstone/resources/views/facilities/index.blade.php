@extends('layouts.app')

@section('title', 'Facilities')

@section('content')
    <h1>Facilities</h1>
    <a href="{{ route('facilities.create') }}" class="btn btn-primary">Create Facility</a>
    <!-- Search/Filter form example -->
    <form method="GET" class="mt-3">
        <div class="row">
            <div class="col">
                <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
            </div>
            <div class="col">
                <input type="text" name="type" class="form-control" placeholder="Filter by type" value="{{ request('type') }}">
            </div>
            <div class="col">
                <input type="text" name="partner" class="form-control" placeholder="Filter by partner" value="{{ request('partner') }}">
            </div>
            <div class="col">
                <input type="text" name="capability" class="form-control" placeholder="Filter by capability" value="{{ request('capability') }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($facilities as $facility)
                <tr>
                    <td>{{ $facility->Name }}</td>
                    <td>{{ $facility->FacilityType }}</td>
                    <td>
                        <a href="{{ route('facilities.show', $facility) }}" class="btn btn-info">View</a>
                        <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $facilities->links() }}
@endsection