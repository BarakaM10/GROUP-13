@extends('layouts.app')

@section('content')
    <h1>Create Participant</h1>
    <form action="{{ route('participants.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="affiliation" class="form-label">Affiliation</label>
            <select name="affiliation" id="affiliation" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::AFFILIATIONS as $aff)
                    <option value="{{ $aff }}">{{ $aff }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="specialization" class="form-label">Specialization</label>
            <select name="specialization" id="specialization" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::SPECIALIZATIONS as $spec)
                    <option value="{{ $spec }}">{{ $spec }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cross_skill_trained" class="form-label">Cross Skill Trained</label>
            <select name="cross_skill_trained" id="cross_skill_trained" class="form-control">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <select name="institution" id="institution" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::INSTITUTIONS as $inst)
                    <option value="{{ $inst }}">{{ $inst }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection