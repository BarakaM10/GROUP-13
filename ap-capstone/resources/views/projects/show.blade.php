@extends('layouts.app')

@section('content')
    <h1>{{ $project->title }}</h1>
    <p><strong>Nature of Project:</strong> {{ $project->nature_of_project }}</p>
    <p><strong>Description:</strong> {{ $project->description }}</p>
    <p><strong>Innovation Focus:</strong> {{ $project->innovation_focus }}</p>
    <p><strong>Prototype Stage:</strong> {{ $project->prototype_stage }}</p>
    <p><strong>Testing Requirements:</strong> {{ $project->testing_requirements }}</p>
    <p><strong>Commercialization Plan:</strong> {{ $project->commercialization_plan }}</p>
    <p><strong>Program:</strong> {{ $project->program->name }}</p>
    <p><strong>Facility:</strong> {{ $project->facility->name }}</p>
    <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <br>
    <br>
    <h2>Participants</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Role on Project</th>
                <th>Skill Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->participants as $pp)
                <tr>
                    <td>{{ $pp->participant->full_name }}</td>
                    <td>{{ $pp->role_on_project }}</td>
                    <td>{{ $pp->skill_role }}</td>
                    <td>
                        <form action="{{ route('project_participants.destroy', $pp) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <h2>Outcomes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Artifact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($project->outcomes as $outcome)
                <tr>
                    <td>{{ $outcome->title }}</td>
                    <td>{{ $outcome->outcome_type }}</td>
                    <td>
                        @if ($outcome->artifact_link)
                            <a href="{{ asset('storage/' . $outcome->artifact_link) }}" download>Download</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('outcomes.show', $outcome) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('outcomes.edit', $outcome) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('outcomes.destroy', $outcome) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <h3>Add Participant</h3>
    <form action="{{ route('projects.assignParticipant', $project) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <select name="participant_id" class="form-control" required>
                    <option value="">Select Participant</option>
                    @foreach ($participants as $participant)
                        <option value="{{ $participant->id }}">{{ $participant->full_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="role_on_project" class="form-control">
                    <option value="">Select Role on Project</option>
                    @foreach (App\Models\ProjectParticipant::ROLES_ON_PROJECT as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="skill_role" class="form-control">
                    <option value="">Select Skill Role</option>
                    @foreach (App\Models\ProjectParticipant::SKILL_ROLES as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
    <br>
    <br>
    <h3>Add Outcome</h3>
    <form action="{{ route('outcomes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="artifact" class="form-label">Artifact</label>
            <input type="file" name="artifact" id="artifact" class="form-control">
        </div>
        <div class="mb-3">
            <label for="outcome_type" class="form-label">Outcome Type</label>
            <select name="outcome_type" id="outcome_type" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Outcome::OUTCOME_TYPES as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quality_certification" class="form-label">Quality Certification</label>
            <input type="text" name="quality_certification" id="quality_certification" class="form-control">
        </div>
        <div class="mb-3">
            <label for="commercialization_status" class="form-label">Commercialization Status</label>
            <select name="commercialization_status" id="commercialization_status" class="form-control">
                <option value="">Select</option>
                @foreach (App\Models\Outcome::COMMERCIALIZATION_STATUSES as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection