<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\HTTp\RedirectResponse;
use Illuminate\HTTp\Response;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\View\View;

class batchcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::with('courses')->get();
        $courses = Course::pluck('name', 'id');
        return view('batches.index', compact('batches', 'courses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('batches.create', compact('courses'));
    
        // return view('batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_ids' => 'required|array|min:1',
            'course_ids.*' => 'exists:courses,id',
            'start_date' => 'required|date',
        ]);

        // Create the batch
        $batch = Batch::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
        ]);

        // Attach selected courses to the batch
        $batch->courses()->attach($request->course_ids);

        return redirect()->route('batches.index')
                         ->with('success', 'Batch created successfully with selected courses.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::with('courses')->findOrFail($id);
        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batch = Batch::with('courses')->findOrFail($id);
        $courses = Course::pluck('name', 'id');
        
        // Get enrolled course IDs
        $enrolledCourseIds = $batch->courses->pluck('id')->toArray();
        
        return view('batches.edit', compact('batch', 'courses', 'enrolledCourseIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'course_ids' => 'required|array|min:1',
            'course_ids.*' => 'exists:courses,id',
            'start_date' => 'required|date',
        ]);

        $batch = Batch::findOrFail($id);
        
        // Update batch basic info
        $batch->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
        ]);

        // Sync courses (removes old ones, adds new ones)
        $batch->courses()->sync($request->course_ids);

        return redirect()->route('batches.index')
                         ->with('success', 'Batch updated successfully with selected courses.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect()->route('batches.index')
                         ->with('success', 'Batch deleted successfully.');
    }
}
