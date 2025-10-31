@extends('layouts.app')

@section('content')
<div class="ml-1 p-6 bg-white rounded  mt-12">

    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-12">
        🏗️ {{ $project->project_name }}
    </h1>

    {{-- Project Details --}}
    <div class="bg-white p-6 rounded shadow space-y-4">
        <p><strong>Project Name:</strong> {{ $project->project_name ?? '-' }}</p>
        <p><strong>Date Started:</strong> {{ $project->date_started ?? '-' }}</p>
        <p><strong>Date Finished:</strong> {{ $project->date_finished ?? '-' }}</p>
        <p><strong>Credit:</strong> {{ $project->credit_to ?? '-' }}</p>

        @if($project->project_photo)
            <img src="{{ asset('images/uccproject.jpg') }}" alt="{{ $project->project_name }}" class="w-full h-64 object-cover rounded">
        @endif

        <div class="mb-12">
            <strong>Description / Achievements:</strong>
            <p>{{ $project->description ?? 'No additional details available.' }}</p>
        </div>

        <a href="{{ route('alumnis.achievements') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mt-12 mb-4 inline-block">
            ← Back to Projects
        </a>
    </div>
</div>
@endsection
