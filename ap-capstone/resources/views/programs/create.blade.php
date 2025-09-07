@extends('layouts.app')

@section('title', 'Create Program')

@section('content')
    <h1>Create Program</h1>
    <form action="{{ route('programs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description" class="form-control"></textarea>
        </div>
        <br>
        <div class="form-group">
            <label for="NationalAlignment">National Alignment</label>
            <input type="text" name="NationalAlignment" id="NationalAlignment" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="FocusAreas">Focus Areas</label>
            <input type="text" name="FocusAreas" id="FocusAreas" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="Phases">Phases</label>
            <input type="text" name="Phases" id="Phases" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('programs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection