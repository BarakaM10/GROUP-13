@extends('layouts.app')

@section('content')
    <h1>Create Program</h1>
    <form action="{{ route('programs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="national_alignment" class="form-label">National Alignment</label>
            <textarea name="national_alignment" id="national_alignment" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="focus_areas" class="form-label">Focus Areas</label>
            <textarea name="focus_areas" id="focus_areas" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="phases" class="form-label">Phases</label>
            <textarea name="phases" id="phases" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection