@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary">Create Service</a>
    <form method="GET" class="mt-3">
        <div class="row">
            <div class="col">
                <select name="facility_id" class="form-control">
                    <option value="">All Facilities</option>
                    @foreach(\App\Models\Facility::all() as $facility)
                        <option value="{{ $facility->FacilityId }}" {{ request('facility_id') == $facility->FacilityId ? 'selected' : '' }}>
                            {{ $facility->Name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="text" name="category" class="form-control" placeholder="Filter by category" value="{{ request('category') }}">
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
               <th>Facility</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->Name }}</td>
                    <td>{{ $service->facility->Name }}</td>
                    <td>{{ $service->Category }}</td>
                    <td>
                        <a href="{{ route('services.show', $service) }}" class="btn btn-info">View</a>
                        <a href="{{ route('services.edit', $service) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $services->links() }}
@endsection
