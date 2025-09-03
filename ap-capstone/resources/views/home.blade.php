@extends('layouts.app')

@section('title', 'Capstone Dashboard')

@section('content')
    <h1>Welcome to the Capstone Management System</h1>
    <p>Manage your facilities, services, equipment, projects, participants, and outcomes.</p>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Facilities</h5>
                    <p class="card-text">View and manage facilities.</p>
                    <a href="{{ route('facilities.index') }}" class="btn btn-primary">Go to Facilities</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Services</h5>
                    <p class="card-text">Manage services offered by facilities.</p>
                    <a href="{{ route('services.index') }}" class="btn btn-primary">Go to Services</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Equipment</h5>
                    <p class="card-text">Manage equipment used in projects.</p>
                    <a href="{{ route('equipment.index') }}" class="btn btn-primary">Go to Equipment</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Projects</h5>
                    <p class="card-text">Manage projects and their details.</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Go to Projects</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Participants</h5>
                    <p class="card-text">Manage project participants.</p>
                    <a href="{{ route('participants.index') }}" class="btn btn-primary">Go to Participants</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Outcomes</h5>
                    <p class="card-text">View and manage project outcomes.</p>
                    <a href="{{ route('outcomes.index') }}" class="btn btn-primary">Go to Outcomes</a>
                </div>
            </div>
        </div>
    </div>
@endsection