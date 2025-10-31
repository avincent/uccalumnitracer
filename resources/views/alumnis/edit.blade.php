@extends('layouts.app')

@section('content')
<div class="ml-1 p-6 bg-white rounded  mt-12">
    <!-- Header inside the container -->
    <h1 class="text-2xl font-bold mb-6">🎓 Edit Alumni</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnis.update', $alumni->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Student ID -->
            <div>
                <label class="block text-gray-700">Student ID</label>
                <input type="text" name="student_id" value="{{ $alumni->student_id }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $alumni->email }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- First Name -->
            <div>
                <label class="block text-gray-700">First Name</label>
                <input type="text" name="first_name" value="{{ $alumni->first_name }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-gray-700">Last Name</label>
                <input type="text" name="last_name" value="{{ $alumni->last_name }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Suffix -->
            <div>
                <label class="block text-gray-700">Suffix</label>
                <input type="text" name="suffix" value="{{ $alumni->suffix }}" class="w-full border p-2 rounded">
            </div>

            <!-- Course -->
            <!-- Course (Dropdown Selection) -->
<div>
    <label class="block text-gray-700">Course</label>
    <select name="course" class="w-full border p-2 rounded" required>
        @if ($alumni->course)
            <!-- Show current course first -->
            <option value="{{ $alumni->course }}" selected>{{ $alumni->course }}</option>
        @else
            <!-- Placeholder when no course is selected -->
            <option value="" disabled selected>Select Course</option>
        @endif

        <!-- Education -->
        <option value="Bachelor of Elementary Education (B.Ed) - Early Childhood Education">B.Ed - Early Childhood Education</option>
        <option value="Bachelor of Elementary Education (B.Ed) - General Education">B.Ed - General Education</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - Biology">B.S.Ed - Biology</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - English">B.S.Ed - English</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - Filipino">B.S.Ed - Filipino</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - Mathematics">B.S.Ed - Mathematics</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - Music/Arts/PE/Health">B.S.Ed - MAPEH</option>
        <option value="Bachelor of Secondary Education (B.S.Ed) - Social Studies">B.S.Ed - Social Studies</option>

        <!-- Business and Accountancy -->
        <option value="Bachelor of Science in Accountancy (B.S.A)">B.S. in Accountancy</option>
        <option value="Bachelor of Business Administration (B.B.A) - Business Economics">B.B.A - Business Economics</option>
        <option value="Bachelor of Business Administration (B.B.A) - Financial Management">B.B.A - Financial Management</option>
        <option value="Bachelor of Business Administration (B.B.A) - Human Resource Development Management">B.B.A - HR Development Management</option>
        <option value="Bachelor of Business Administration (B.B.A) - Marketing Management">B.B.A - Marketing Management</option>
        <option value="Bachelor of Business Administration (B.B.A) - Production/Operations Management">B.B.A - Production/Operations Management</option>
        <option value="Bachelor of Science in Real Estate Management (B.S.R.E.M)">B.S. in Real Estate Management</option>

        <!-- Technology & Computing -->
        <option value="Bachelor of Science in Computer Science (B.S.C.S)">B.S. in Computer Science</option>
        <option value="Bachelor of Science in Information System (B.S.I.S)">B.S. in Information System</option>

        <!-- Arts & Humanities -->
        <option value="AB in English">AB in English</option>
        <option value="AB in History">AB in History</option>
        <option value="AB in Political Science">AB in Political Science</option>

        <!-- Health Sciences -->
        <option value="Bachelor of Science in Nursing (B.S.N)">B.S. in Nursing</option>
    </select>
</div>


            <!-- Section -->
            <div>
                <label class="block text-gray-700">Section</label>
                <input type="text" name="section" value="{{ $alumni->section }}" class="w-full border p-2 rounded">
            </div>

            <!-- Year Graduated -->
            <div>
                <label class="block text-gray-700">Year Graduated</label>
                <input type="number" name="year_graduated" value="{{ $alumni->year_graduated }}" class="w-full border p-2 rounded" required>
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" value="{{ $alumni->phone }}" class="w-full border p-2 rounded">
            </div>

            <!-- Address -->
            <div class="col-span-2">
                <label class="block text-gray-700">Address</label>
                <input type="text" name="address" value="{{ $alumni->address }}" class="w-full border p-2 rounded">
            </div>

            <!-- Employment Status -->
            <div>
                <label class="block text-gray-700">Employment Status</label>
                <input type="text" name="employment_status" value="{{ $alumni->employment_status }}" class="w-full border p-2 rounded">
            </div>

            <!-- Company Name -->
            <div>
                <label class="block text-gray-700">Company Name</label>
                <input type="text" name="company_name" value="{{ $alumni->company_name }}" class="w-full border p-2 rounded">
            </div>

            <!-- Position -->
            <div>
                <label class="block text-gray-700">Position</label>
                <input type="text" name="position" value="{{ $alumni->position }}" class="w-full border p-2 rounded">
            </div>

            <!-- Achievements -->
            <div class="col-span-2">
                <label class="block text-gray-700">Achievements</label>
                <textarea name="achievements" rows="3" class="w-full border p-2 rounded">{{ $alumni->achievements }}</textarea>
            </div>

            <!-- Notes -->
            <div class="col-span-2">
                <label class="block text-gray-700">Notes</label>
                <textarea name="notes" rows="3" class="w-full border p-2 rounded">{{ $alumni->notes }}</textarea>
            </div>

            <!-- Profile Picture -->
            <div class="col-span-2">
                <label class="block text-gray-700">Profile Picture</label>
                @if ($alumni->profile_picture)
                    <img src="{{ asset($alumni->profile_picture) }}" class="w-24 h-24 object-cover rounded mb-2">
                @endif
                <input type="file" name="profile_picture" class="w-full border p-2 rounded">
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update Alumni
        </button>
    </form>
</div>
@endsection
