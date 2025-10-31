@extends('layouts.app')

@section('content')
<div class="ml-4 p-6 max-w-6xl">

    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-12">
        🏆 Alumni Achievements
    </h1>

    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($projects as $achievement)
                <x-card
                    title="{{ $achievement->project_name }}"
                    image="{{ 'images/uccproject.jpg' }}"
                    subtitle="{{ \Carbon\Carbon::parse($achievement->date_started)->format('M Y') }} - {{ \Carbon\Carbon::parse($achievement->date_finished)->format('M Y') }}"
                    credit="{{ $achievement->credit_to ?? 'Alumni Collective' }}"
                    :detailsUrl="route('alumnis.projectdetail', $achievement->id)"
                >
                    <p class="text-gray-700 text-sm">{{ $achievement->description ?? 'No description provided.' }}</p>
                </x-card>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 text-lg">No achievements recorded yet.</p>
    @endif

    <div class="mt-6">
        <a href="{{ route('alumnis.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Back to Alumni Directory
        </a>
    </div>
</div>
@endsection
