@extends('layouts.app')

@section('content')
    <h1>Create Equipment</h1>
    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="facility_id" class="form-label">Facility</label>
            <select name="facility_id" id="facility_id" class="form-control" required>
                <option value="">Select Facility</option>
                @foreach ($facilities as $facility)
                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="capabilities" class="form-label">Capabilities</label>
            <textarea name="capabilities" id="capabilities" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="inventory_code" class="form-label">Inventory Code</label>
            <input type="text" name="inventory_code" id="inventory_code" class="form-control">
        </div>
        <div class="mb-3">
            <label for="usage_domain" class="form-label">Usage Domain</label>
            <select name="usage_domain" id="usage_domain" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Equipment::USAGE_DOMAINS as $domain)
                    <option value="{{ $domain }}">{{ $domain }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="support_phase" class="form-label">Support Phase</label>
            <select name="support_phase" id="support_phase" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Equipment::SUPPORT_PHASES as $phase)
                    <option value="{{ $phase }}">{{ $phase }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection