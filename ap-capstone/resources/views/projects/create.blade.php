@extends('layouts.app')

@section('title', 'Create Participant')

@section('content')
    <h1>Create Participant</h1>
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="FullName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Affiliation</label>
            <input type="text" name="Affiliation" class="form-control">
        </div>
        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="Specialization" class="form-control">
        </div>
        <div class="mb-3">
            <label>Cross-Skill Trained</label>
            <input type="checkbox" name="CrossSkillTrained" value="1">
        </div>
        <div class="mb-3">
            <label>Institution</label>
            <input type="text" name="Institution" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
