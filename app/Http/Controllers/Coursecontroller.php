<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class coursecontroller extends Controller
{
    // Display all courses
    public function index()
    {
        $courses = course::all();
        return view('course.index', compact('courses'));
    }

    // Show form to create a new course
    public function create()
    {
        return view('course.create');
    }

    // Store new course
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'syllabus' => 'required',
            'duration' => 'required',
        ]);

        course::create($request->all());

        return redirect()->route('courses.index')
                         ->with('success', 'Course created successfully.');
    }

    // Show single course
    public function show(string $id)
    {
        $course = course::findOrFail($id); // safer
        return view('course.show', compact('course'));
    }

    // Show form to edit course
    public function edit(string $id)
    {
        $course = course::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    // Update existing course
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'syllabus' => 'required',
            'duration' => 'required',
        ]);

        $course = course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index')
                         ->with('success', 'Course updated successfully.');
    }

    // Delete course
    public function destroy(string $id)
    {
        $course = course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')
                         ->with('success', 'Course deleted successfully.');
    }
}
