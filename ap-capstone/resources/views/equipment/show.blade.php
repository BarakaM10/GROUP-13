@extends('layouts.app')

@section('content')
    <h1>{{ $equipment->name }}</h1>
    <p><strong>Capabilities:</strong> {{ $equipment->capabilities }}</p>
    <p><strong>Description:</strong> {{ $equipment->description }}</p>
    <p><strong>Inventory Code:</strong> {{ $equipment->inventory_code }}</p>
    <p><strong>Usage Domain:</strong> {{ $equipment->usage_domain }}</p>
    <p><strong>Support Phase:</strong> {{ $equipment->support_phase }}</p>
    <p><strong>Facility:</strong> {{ $equipment->facility->name }}</p>
    <a href="{{ route('equipment.edit', $equipment) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('equipment.destroy', $equipment) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection