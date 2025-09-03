@extends('layouts.app')

@section('title', 'Equipment')

@section('content')
    <h1>Equipment</h1>
    <a href="{{ route('equipment.create') }}" class="btn btn-primary">Create Equipment</a>
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
                <input type="text" name="capability" class="form-control" placeholder="Filter by capability" value="{{ request('capability') }}">
            </div>
            <div class="col">
                <input type="text" name="domain" class="form-control" placeholder="Filter by usage domain" value="{{ request('domain') }}">
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
                <th>Usage Domain</th>
                <th>Support Phase</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equipment as $item)
                <tr>
                    <td>{{ $item->Name }}</td>
                    <td>{{ $item->facility->Name }}</td>
                    <td>{{ $item->UsageDomain }}</td>
                    <td>{{ $item->SupportPhase }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $item) }}" class="btn btn-info">View</a>
                        <a href="{{ route('equipment.edit', $item) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('equipment.destroy', $item) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $equipment->links() }}
@endsection
