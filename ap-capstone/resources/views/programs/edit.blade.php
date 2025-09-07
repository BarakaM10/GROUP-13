@extends('layouts.app')

@section('title', 'Edit Program')

@section('content')
    <h1>Edit Program</h1>
    <form action="{{ route('programs.update', $program->ProgramId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" value="{{ old('Name', $program->Name) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control">{{ old('Description', $program->Description) }}</textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="NationalAlignment">National Alignment</label>
            <input type="text" name="NationalAlignment" id="NationalAlignment" class="form-control" value="{{ old('NationalAlignment', $program->NationalAlignment) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="FocusAreas">Focus Areas</label>
            <input type="text" name="FocusAreas" id="FocusAreas" class="form-control" value="{{ old('FocusAreas', $program->FocusAreas) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="Phases">Phases</label>
            <input type="text" name="Phases" id="Phases" class="form-control" value="{{ old('Phases', $program->Phases) }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection