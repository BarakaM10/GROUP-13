@extends('layouts.app')

@section('content')
    <h1>Equipment for Facility: {{ $facility->name }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Usage Domain</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($equipment as $equip)
                <tr>
                    <td>{{ $equip->id }}</td>
                    <td>{{ $equip->name }}</td>
                    <td>{{ $equip->usage_domain }}</td>
                    <td>
                        <a href="{{ route('equipment.show', $equip) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection