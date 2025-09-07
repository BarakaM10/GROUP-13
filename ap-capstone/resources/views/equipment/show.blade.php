@extends('layouts.app')

@section('title', 'Equipment Details')

@section('content')
    <h1>{{ $equipment->Name }}</h1>
    <p><strong>Facility:</strong> {{ $equipment->facility->Name }}</p>
    <p><strong>Capabilities:</strong> {{ $equipment->Capabilities ?? 'N/A' }}</p>
    <p><strong>Description:</strong> {{ $equipment->Description ?? 'N/A' }}</p>
    <p><strong>Inventory Code:</strong> {{ $equipment->InventoryCode ?? 'N/A' }}</p>
    <p><strong>Usage Domain:</strong> {{ $equipment->UsageDomain ?? 'N/A' }}</p>
    <p><strong>Support Phase:</strong> {{ $equipment->SupportPhase ?? 'N/A' }}</p>
    <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Back</a>
@endsection
