@props([
    'title' => 'Project Name',
    'image' => 'images/uccproject.jpg',
    'subtitle' => '',
    'credit' => null,
    'detailsUrl' => '#', // URL for "See Details" button
])

<div {{ $attributes->merge([
        'class' => 'bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-lg transition duration-300 ease-in-out flex flex-col justify-between'
    ]) }}>

    {{-- Title and Subtitle --}}
    <div class="mb-4">
        <p class="font-semibold text-lg text-gray-800">{{ $title }}</p>
        @if($subtitle)
            <p class="text-sm text-gray-500">{{ $subtitle }}</p>
        @endif
    </div>

    {{-- Credit --}}
    @if($credit)
        <p class="text-gray-600 text-sm mb-2">Credit: {{ $credit }}</p>
    @endif

    {{-- Slot for additional content (like achievements list) --}}
    <div class="mb-4 flex-1">
        {{ $slot }}
    </div>

    {{-- Image at the bottom --}}
    @if($image)
        <div class="mb-4">
            <img src="{{ asset($image) }}" alt="{{ $title }}" class="w-full h-40 object-cover rounded">
        </div>
    @endif

    {{-- See Details Button --}}
    <a href="{{ $detailsUrl }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-center">
        See Details
    </a>

</div>
