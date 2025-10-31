<?php

namespace App\Http\Controllers;
use App\Models\Alumni;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB; // <--- Add this
class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnis = Alumni::all();
        return view('alumnis.index', compact('alumnis'));
    }

    // Show create form
    public function create()
    {
        return view('alumnis.create');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:alumni,student_id|max:20',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'suffix' => 'nullable|string|max:10',
            'email' => 'required|email|unique:alumni,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'course' => 'required|string|max:150',
            'section' => 'nullable|string|max:150',
            'major' => 'nullable|string|max:150',
            'year_graduated' => 'required|integer',
            'employment_status' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:150',
            'position' => 'nullable|string|max:150',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'achievements' => 'nullable|string',
            'notes' => 'nullable|string',
            'is_verified' => 'boolean',

        ]);

        // Handle image upload if provided
        if ($request->hasFile('profile_picture')) {
            // Store in public/images
        $imageName = time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('images'), $imageName);
        $validated['profile_picture'] = 'images/' . $imageName;
        }

        Alumni::create($validated);

        return redirect()->route('alumnis.index')->with('success', 'Alumni added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $alumni = Alumni::findOrFail($id);
        return view('alumnis.view', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $alumni = Alumni::findOrFail($id);
        return view('alumnis.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $alumni = Alumni::findOrFail($id);

            $validated = $request->validate([
        'student_id' => [
            'required',
            'string',
            'max:50',
            Rule::unique('alumni')->ignore($id),
        ],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('alumni')->ignore($id),
        ],

            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'last_name' => 'required|string|max:100',
            'suffix' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'course' => 'required|string|max:150',
            'section' => 'nullable|string|max:150',
            'major' => 'nullable|string|max:150',
            'year_graduated' => 'required|integer',
            'employment_status' => 'nullable|string|max:100',
            'company_name' => 'nullable|string|max:150',
            'position' => 'nullable|string|max:150',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'achievements' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        // Handle image upload if new file is uploaded
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/alumni'), $filename);
            $validated['profile_picture'] = 'images/alumni/' . $filename;
        }

        $alumni->update($validated);

        return redirect()->route('alumnis.index')->with('success', 'Alumni record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);

        // Optional: Delete profile picture from storage
        if ($alumni->profile_picture && file_exists(public_path($alumni->profile_picture))) {
            unlink(public_path($alumni->profile_picture));
        }

        $alumni->delete();

        return redirect()->route('alumnis.index')->with('success', 'Alumni record deleted successfully!');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $alumnis = Alumni::query()
            ->where(function($query) use ($search) {
                $query->where('last_name', 'like', "%{$search}%")
                    ->orWhere('course', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('alumnis.searchresult', compact('alumnis'));
    }

   // List all projects/achievements
    public function achievements()
    {
        // Just get the latest 9 achievements
        $projects = \App\Models\Achievement::latest()->take(9)->get();

        return view('alumnis.achievements', compact('projects'));
    }


// Show single project/achievement detail
    public function projectDetail($id)
    {
        $project = \App\Models\Achievement::findOrFail($id); // no with('alumni')
        return view('alumnis.projectdetail', compact('project'));
    }


public function dashboard()
    {
        $totalAlumni = Alumni::count();
        $recentAlumni = Alumni::where('year_graduated', '>=', 2024)->count();
        $oldAlumni = $totalAlumni - $recentAlumni;

        return view('alumnis.dashboard', compact('oldAlumni', 'recentAlumni', 'totalAlumni'));
    }




}
