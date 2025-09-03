@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf @method('PUT')
    
        <div class="mb-3">
            <label>Innovation Focus</label>
            <input type="text" name="InnovationFocus" class="form-control" value="{{ $project->InnovationFocus }}">
        </div>
        <div class="mb-3">
            <label>Prototype Stage</label>
            <input type="text" name="PrototypeStage" class="form-control" value="{{ $project->PrototypeStage }}">
        </div>
        <div class="mb-3">
            <label>Commercialization Plan</label>
            <textarea name="CommercializationPlan" class="form-control">{{ $project->CommercializationPlan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection