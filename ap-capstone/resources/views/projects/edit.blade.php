@extends('layouts.app')

@section('title', 'Edit Participant')

@section('content')
    <h1>Edit Participant</h1>
    <form action="{{ route('participants.update', $participant) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="FullName" class="form-control" value="{{ $participant->FullName }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" value="{{ $participant->Email }}" required>
        </div>
        <div class="mb-3">
            <label>Affiliation</label>
            <input type="text" name="Affiliation" class="form-control" value="{{ $participant->Affiliation }}">
        </div>
        <div class="mb-3">
            <label>Specialization</label>
            <input type="text" name="Specialization" class="form-control" value="{{ $participant->Specialization }}">
        </div>
        <div class="mb-3">
            <label>Cross-Skill Trained</label>
            <input type="checkbox" name="CrossSkillTrained" value="1" {{ $participant->CrossSkillTrained ? 'checked' : '' }}>
        </div>
        <div class="mb-3">
            <label>Institution</label>
            <input type="text" name="Institution" class="form-control" value="{{ $participant->Institution }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
