@extends('layouts.app')

@section('title', 'Outcome Details')

@section('content')
    <h1>{{ $outcome->Title }}</h1>
    <p>Project: {{ $outcome->project->Title }}</p>
    <p>Description: {{ $outcome->Description }}</p>
    <p>Outcome Type: {{ $outcome->OutcomeType }}</p>
    <p>Quality Certification: {{ $outcome->QualityCertification }}</p>
    <p>Commercialization Status: {{ $outcome->CommercializationStatus }}</p>
    <a href="{{ route('outcomes.index') }}" class="btn btn-secondary">Back</a>
@endsection

// resources/views/outcomes/create.blade.php
@extends('layouts.app')

@section('title', 'Create Outcome')

@section('content')
    <h1>Create Outcome</h1>
    <form action="{{ route('outcomes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Project</label>
            <select name="ProjectId" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->ProjectId }}">{{ $project->Title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="Title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="Description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Outcome Type</label>
            <input type="text" name="OutcomeType" class="form-control">
        </div>
        <div class="mb-3">
            <label>Quality Certification</label>
            <input type="text" name="QualityCertification" class="form-control">
        </div>
        <div class="mb-3">
            <label>Commercialization Status</label>
            <input type="text" name="CommercializationStatus" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
