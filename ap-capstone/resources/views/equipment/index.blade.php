@extends('layouts.app')

@section('title', 'Equipment')

@section('content')
    <h1>Equipment</h1>
    <a href="{{ route('equipment.create') }}" class="btn btn-primary mb-3">Create Equipment</a>
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
            @foreach($equipment as $item)
                <tr>
                    <td>{{ $item->EquipmentId }}</td>
                    <td>{{ $item->Name }}</td>
                    <td>{{ $item->facility->Name ?? 'None' }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $item->EquipmentId) }}" class="btn btn-sm btn-success">View</a>
                        <a href="{{ route('equipment.edit', $item->EquipmentId) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('equipment.destroy', $item->EquipmentId) }}" method="POST" style="display:inline;">
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