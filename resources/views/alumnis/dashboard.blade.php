@extends('layouts.app')
@section('content')

<!-- Search Bar -->
<div class="flex items-center mb-6 mt-16">
    <form action="{{ route('alumnis.search') }}" method="GET" class="flex w-full">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search by last name or course..."
            class="flex-1 px-4 py-3 rounded-l border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
        >
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-r hover:bg-blue-700">
            Search
        </button>
    </form>
</div>


<!-- Chart and Cards -->
<div class="flex flex-col lg:flex-row gap-6">
    <!-- Doughnut Chart -->
    <div class="bg-white p-6 rounded shadow w-full lg:w-2/3 h-96 flex items-center justify-center">
        <canvas id="alumniDoughnut" class="h-full w-full"></canvas>
    </div>

    <!-- Stats Cards -->
    <div class="flex flex-col gap-6 w-full lg:w-1/3">
        <!-- Registered Alumni Card -->
        <div class="bg-white p-6 flex items-center gap-4 rounded shadow">
            <img src="{{ asset('images/alumni.jpg') }}" alt="Registered Alumni" class="w-24 h-32 object-cover rounded">
            <div>
                <div class="text-gray-500">Registered Alumni</div>
                <div class="text-2xl font-bold">{{ $totalAlumni }}</div>
            </div>
        </div>

        <!-- Recently Added Alumni Card -->
        <div class="bg-white p-6 flex items-center gap-4 rounded shadow">
            <img src="{{ asset('images/toga.jpg') }}" alt="Recently Added Alumni" class="w-24 h-32 object-cover rounded">
            <div>
                <div class="text-gray-500">Recently Added (2024+)</div>
                <div class="text-2xl font-bold">{{ $recentAlumni }}</div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('alumniDoughnut').getContext('2d');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Registered Alumni', 'Recently Added (2024+)'],
            datasets: [{
                data: [{{ $totalAlumni }}, {{ $recentAlumni }}],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(16, 185, 129, 0.7)'
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(16, 185, 129, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '50%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14,
                            weight: '500'
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Alumni Distribution',
                    font: {
                        size: 18,
                        weight: '600'
                    }
                }
            }
        }
    });
</script>

@endsection
