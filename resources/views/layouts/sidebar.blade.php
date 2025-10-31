<aside class="w-48 bg-white shadow-md min-h-screen fixed">
    <div class="p-6 text-xl font-bold border-b">UCC Alumni</div>
    <nav class="mt-6">
        <a href="{{ route('dashboard') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded">
            Dashboard
        </a>
        <a href="{{ route('alumnis.index') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded">Alumni Directory</a>
        <a href="{{ route('alumnis.achievements') }}" class="flex items-center p-3 text-gray-700 hover:bg-gray-100 rounded">Alumni Achievements</a>

    </nav>
</aside>
