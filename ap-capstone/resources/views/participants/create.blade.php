@extends('layouts.app')

@section('title', 'Create Participant')

@section('content')
    <h1>Create Participant</h1>
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="FullName">Full Name</label>
            <input type="text" name="FullName" id="FullName" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" name="Email" id="Email" class="form-control" required>
        </div>
        <br>
        <div class="form-group">
            <label for="Affiliation">Affiliation</label>
            <input type="text" name="Affiliation" id="Affiliation" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="Specialization">Specialization</label>
            <input type="text" name="Specialization" id="Specialization" class="form-control">
        </div>
        <br>
        <div class="form-group">
            <label for="CrossSkillTrained">Cross-Skill Trained</label>
            <select name="CrossSkillTrained" id="CrossSkillTrained" class="form-control">
                <option value="1">Yes</option>
                <option value="0" selected>No</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="Institution">Institution</label>
            <input type="text" name="Institution" id="Institution" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('participants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection