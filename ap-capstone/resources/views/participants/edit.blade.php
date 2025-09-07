@extends('layouts.app')

@section('title', 'Edit Participant')

@section('content')
    <h1>Edit Participant</h1>
    <form action="{{ route('participants.update', $participant->ParticipantId) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="FullName">Full Name</label>
            <input type="text" name="FullName" id="FullName" class="form-control" value="{{ old('FullName', $participant->FullName) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" class="form-control" value="{{ old('Email', $participant->Email) }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Affiliation">Affiliation</label>
            <input type="text" name="Affiliation" id="Affiliation" class="form-control" value="{{ old('Affiliation', $participant->Affiliation) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="Specialization">Specialization</label>
            <input type="text" name="Specialization" id="Specialization" class="form-control" value="{{ old('Specialization', $participant->Specialization) }}">
        </div>
        <br>
        <div class="form-group">
            <label for="CrossSkillTrained">Cross-Skill Trained</label>
            <select name="CrossSkillTrained" id="CrossSkillTrained" class="form-control">
                <option value="1" {{ $participant->CrossSkillTrained ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$participant->CrossSkillTrained ? 'selected' : '' }}>No</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Institution">Institution</label>
            <input type="text" name="Institution" id="Institution" class="form-control" value="{{ old('Institution', $participant->Institution) }}">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection