@extends('layouts.app')

@section('content')
    <h1>Edit Program</h1>
    <form action="{{ route('programs.update', $program) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $program->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $program->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="national_alignment" class="form-label">National Alignment</label>
            <textarea name="national_alignment" id="national_alignment" class="form-control">{{ $program->national_alignment }}</textarea>
        </div>
        <div class="mb-3">
            <label for="focus_areas" class="form-label">Focus Areas</label>
            <textarea name="focus_areas" id="focus_areas" class="form-control">{{ $program->focus_areas }}</textarea>
        </div>
        <div class="mb-3">
            <label for="phases" class="form-label">Phases</label>
            <textarea name="phases" id="phases" class="form-control">{{ $program->phases }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection