@extends('layouts.app')

@section('content')
<div class="ml-1 p-6 bg-white rounded  mt-12">

    <h1 class="text-3xl font-bold mb-6">🎓 Alumni Details</h1>

    <!-- Full Name -->
    <div class="mb-4">
        <strong class="text-gray-700">Full Name:</strong>
        <p class="text-lg">{{ $alumni->first_name }} {{ $alumni->middle_name ?? '' }} {{ $alumni->last_name }} {{ $alumni->suffix ?? '' }}</p>
    </div>

    <!-- Contact Information -->
    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <strong class="text-gray-700">Student ID:</strong>
            <p>{{ $alumni->student_id }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Email:</strong>
            <p>{{ $alumni->email }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Phone:</strong>
            <p>{{ $alumni->phone ?? '-' }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Address:</strong>
            <p>{{ $alumni->address ?? '-' }}</p>
        </div>
    </div>

    <!-- Education -->
    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <strong class="text-gray-700">Course:</strong>
            <p>{{ $alumni->course }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Section:</strong>
            <p>{{ $alumni->section ?? '-' }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Major:</strong>
            <p>{{ $alumni->major ?? '-' }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Year Graduated:</strong>
            <p>{{ $alumni->year_graduated }}</p>
        </div>
    </div>

    <!-- Employment -->
    <div class="mb-4 grid grid-cols-2 gap-4">
        <div>
            <strong class="text-gray-700">Employment Status:</strong>
            <p>{{ $alumni->employment_status ?? '-' }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Company Name:</strong>
            <p>{{ $alumni->company_name ?? '-' }}</p>
        </div>
        <div>
            <strong class="text-gray-700">Position:</strong>
            <p>{{ $alumni->position ?? '-' }}</p>
        </div>
    </div>

    <!-- Achievements and Notes -->
    <div class="mb-4">
        <strong class="text-gray-700">Achievements:</strong>
        <p>{{ $alumni->achievements ?? '-' }}</p>
    </div>
    <div class="mb-4">
        <strong class="text-gray-700">Notes:</strong>
        <p>{{ $alumni->notes ?? '-' }}</p>
    </div>

    <!-- Profile Picture -->
    <div class="mb-6">
        <strong class="text-gray-700">Profile Picture:</strong><br>
        @if ($alumni->profile_picture)
            <img src="{{ asset($alumni->profile_picture) }}" alt="Profile Picture" class="w-40 h-40 object-cover rounded mt-2">
        @else
            <p>No image uploaded</p>
        @endif
    </div>

    <!-- Actions -->
    <div class="flex gap-4">
        <a href="{{ route('alumnis.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Back to List</a>
        <a href="{{ route('alumnis.edit', $alumni->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Edit Alumni</a>
    </div>

</div>
@endsection
