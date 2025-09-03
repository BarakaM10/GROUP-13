@extends('layouts.app')

@section('title', 'Equipment Details')

@section('content')
    <h1>{{ $equipment->Name }}</h1>
    <p>Facility: {{ $equipment->facility->Name }}</p>
    <p>Capabilities: {{ $equipment->Capabilities }}</p>
    <p>Description: {{ $equipment->Description }}</p>
    <p>Inventory Code: {{ $equipment->InventoryCode }}</p>
    <p>Usage Domain: {{ $equipment->UsageDomain }}</p>
    <p>Support Phase: {{ $equipment->SupportPhase }}</p>
    <a href="{{ route('equipment.index') }}" class="btn btn-secondary">Back</a>
@endsection
