@extends('layouts.app')

@section('content')
<div class="ml-1 p-6 bg-white rounded  mt-12">
    <h1 class="text-2xl font-bold mb-6 mt-12">🎓 Add New Alumni</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnis.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Student ID -->
            <div>
                <label class="block text-gray-700">Student ID</label>
                <input type="text" name="student_id" class="w-full border p-2 rounded" required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border p-2 rounded" required>
            </div>

            <!-- First Name -->
            <div>
                <label class="block text-gray-700">First Name</label>
                <input type="text" name="first_name" class="w-full border p-2 rounded" required>
            </div>

            <!-- Middle Name -->
            <div>
                <label class="block text-gray-700">Middle Name</label>
                <input type="text" name="middle_name" class="w-full border p-2 rounded">
            </div>

            <!-- Last Name -->
            <div>
                <label class="block text-gray-700">Last Name</label>
                <input type="text" name="last_name" class="w-full border p-2 rounded" required>
            </div>

            <!-- Suffix -->
            <div>
                <label class="block text-gray-700">Suffix</label>
                <input type="text" name="suffix" class="w-full border p-2 rounded" placeholder="Jr., Sr., III">
            </div>

            <!-- Course -->
            <!-- Course (Dropdown Selection) -->
<div>
    <label class="block text-gray-700">Course</label>
    <select name="course" class="w-full border p-2 rounded" required>
        <option value="" disabled selected>Select Course</option>

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


            <!-- Major -->
            <div>
                <label class="block text-gray-700">Major</label>
                <input type="text" name="major" class="w-full border p-2 rounded" placeholder="Optional">
            </div>

            <!-- Year Graduated -->
            <div>
                <label class="block text-gray-700">Year Graduated</label>
                <input type="number" name="year_graduated" class="w-full border p-2 rounded" required>
            </div>

            <!-- Section -->
            <div>
                <label class="block text-gray-700">Section</label>
                <input type="text" name="section" class="w-full border p-2 rounded" placeholder="e.g. CS-4A, IT-3B">
            </div>

            <!-- Employment Status -->
            <div>
                <label class="block text-gray-700">Employment Status</label>
                <input type="text" name="employment_status" class="w-full border p-2 rounded">
            </div>

            <!-- Company Name -->
            <div>
                <label class="block text-gray-700">Company Name</label>
                <input type="text" name="company_name" class="w-full border p-2 rounded">
            </div>

            <!-- Position -->
            <div>
                <label class="block text-gray-700">Position</label>
                <input type="text" name="position" class="w-full border p-2 rounded" placeholder="e.g. Software Engineer, Accountant">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full border p-2 rounded" placeholder="e.g. 09171234567">
            </div>

            <!-- Address -->
            <div class="col-span-2">
                <label class="block text-gray-700">Address</label>
                <input type="text" name="address" class="w-full border p-2 rounded" placeholder="City, Province">
            </div>

            <!-- Achievements -->
            <div class="col-span-2">
                <label class="block text-gray-700">Achievements</label>
                <textarea name="achievements" rows="3" class="w-full border p-2 rounded"></textarea>
            </div>

            <!-- Notes -->
            <div class="col-span-2">
                <label class="block text-gray-700">Notes</label>
                <textarea name="notes" rows="3" class="w-full border p-2 rounded" placeholder="Remarks or admin notes..."></textarea>
            </div>

            <!-- Profile Picture -->
            <div class="col-span-2">
                <label class="block text-gray-700">Profile Picture</label>
                <input type="file" name="profile_picture" class="w-full border p-2 rounded">
            </div>
        </div>

        <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save Alumni
        </button>
    </form>
</div>
@endsection
