@extends('layouts.app')

@section('content')
    <h1>Equipment</h1>
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="capabilities" placeholder="Filter by Capabilities" class="form-control" value="{{ request('capabilities') }}">
            </div>
            <div class="col-md-6">
                <select name="usage_domain" class="form-control">
                    <option value="">Filter by Usage Domain</option>
                    @foreach (App\Models\Equipment::USAGE_DOMAINS as $domain)
                        <option value="{{ $domain }}" @if(request('usage_domain') == $domain) selected @endif>{{ $domain }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>
    <a href="{{ route('equipment.create') }}" class="btn btn-primary mb-3">Create Equipment</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Usage Domain</th>
                <th>Support Phase</th>
                <th>Facility</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipment as $equip)
                <tr>
                    <td>{{ $equip->id }}</td>
                    <td>{{ $equip->name }}</td>
                    <td>{{ $equip->usage_domain }}</td>
                    <td>{{ $equip->support_phase }}</td>
                    <td>{{ $equip->facility->name }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $equip) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('equipment.edit', $equip) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('equipment.destroy', $equip) }}" method="POST" style="display: inline;">
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