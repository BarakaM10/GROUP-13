@extends('layouts.app')

@section('content')
    <h1>Edit Participant</h1>
    <form action="{{ route('participants.update', $participant) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name" class="form-control" value="{{ $participant->full_name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $participant->email }}" required>
        </div>
        <div class="mb-3">
            <label for="affiliation" class="form-label">Affiliation</label>
            <select name="affiliation" id="affiliation" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::AFFILIATIONS as $aff)
                    <option value="{{ $aff }}" @if($participant->affiliation == $aff) selected @endif>{{ $aff }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="specialization" class="form-label">Specialization</label>
            <select name="specialization" id="specialization" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::SPECIALIZATIONS as $spec)
                    <option value="{{ $spec }}" @if($participant->specialization == $spec) selected @endif>{{ $spec }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="cross_skill_trained" class="form-label">Cross Skill Trained</label>
            <select name="cross_skill_trained" id="cross_skill_trained" class="form-control">
                <option value="0" @if(!$participant->cross_skill_trained) selected @endif>No</option>
                <option value="1" @if($participant->cross_skill_trained) selected @endif>Yes</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="institution" class="form-label">Institution</label>
            <select name="institution" id="institution" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Participant::INSTITUTIONS as $inst)
                    <option value="{{ $inst }}" @if($participant->institution == $inst) selected @endif>{{ $inst }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection