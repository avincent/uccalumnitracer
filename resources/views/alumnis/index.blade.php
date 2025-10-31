@extends('layouts.app')

@section('content')
<div class="ml-2 p-4"> {{-- pushes content to the right (because of sidebar) --}}
    <h1 class="text-3xl font-bold text-gray-700 mb-6 mt-12">🎓 Alumni Directory</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add New Alumni Button --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('alumnis.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Add Alumni
        </a>
    </div>

    {{-- Alumni Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full text-left text-gray-700">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-6 py-3">Profile</th>
                    <th class="px-6 py-3">Student ID</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Course</th>
                    <th class="px-6 py-3">Year Graduated</th>
                    <th class="px-6 py-3">Employment Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($alumnis as $a)
                    <tr class="border-b hover:bg-gray-50 transition">
                       @php
    $path = public_path($a->profile_picture ?? '');
    $photo = ($a->profile_picture && file_exists($path))
        ? asset($a->profile_picture)
        : asset('images/default.jpg');
@endphp

<td class="px-6 py-4">
    <img src="{{ $photo }}" alt="{{ $a->first_name }}" class="w-12 h-12 rounded-full object-cover">
</td>



                        <td class="px-6 py-4">{{ $a->student_id }}</td>
                        <td class="px-6 py-4 font-semibold">{{ $a->first_name }} {{ $a->last_name }}</td>
                        <td class="px-6 py-4">{{ $a->course }}</td>
                        <td class="px-6 py-4">{{ $a->year_graduated }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded
                                {{ $a->employment_status === 'Employed' ? 'bg-green-100 text-green-700' :
                                   ($a->employment_status === 'Unemployed' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ $a->employment_status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('alumnis.show', $a->id) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('alumnis.edit', $a->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('alumnis.destroy', $a->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Do you want to delete this record?')" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-gray-500">
                            No alumni found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
