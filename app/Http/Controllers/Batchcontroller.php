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
    $batches = Batch::with('course')->get();
    $courses = Course::pluck('name', 'id');
    return view('batches.index', compact('batches', 'courses'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('batch.create', compact('courses'));
    
        // return view('batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required|date',
        ]);

        Batch::create($request->all());

        return redirect()->route('batches.index')
                         ->with('success', 'Batch created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $batch = Batch::find($id);
        return view('batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $batch = Batch::findOrFail($id);
    $courses = Course::pluck('name', 'id'); // Pass courses to the view
    return view('batches.edit', compact('batch', 'courses'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'course_id' => 'required',
            'start_date' => 'required|date',
        ]);

        $batch = Batch::find($id);
        $batch->update($request->all());

        return redirect()->route('batches.index')
                         ->with('success', 'Batch updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        return redirect()->route('batches.index')
                         ->with('success', 'Batch deleted successfully.');
    }
}
