@extends('layouts.app')

@section('content')
    <h1>Facilities</h1>
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="facility_type" class="form-control">
                    <option value="">Filter by Type</option>
                    @foreach (App\Models\Facility::FACILITY_TYPES as $type)
                        <option value="{{ $type }}" @if(request('facility_type') == $type) selected @endif>{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="partner_organization" placeholder="Filter by Partner" class="form-control" value="{{ request('partner_organization') }}">
            </div>
            <div class="col-md-4">
                <input type="text" name="capabilities" placeholder="Filter by Capabilities" class="form-control" value="{{ request('capabilities') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>
    <a href="{{ route('facilities.create') }}" class="btn btn-primary mb-3">Create Facility</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility)
                <tr>
                    <td>{{ $facility->id }}</td>
                    <td>{{ $facility->name }}</td>
                    <td>{{ $facility->location }}</td>
                    <td>{{ $facility->facility_type }}</td>
                    <td>
                        <a href="{{ route('facilities.show', $facility) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('facilities.edit', $facility) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('facilities.destroy', $facility) }}" method="POST" style="display: inline;">
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