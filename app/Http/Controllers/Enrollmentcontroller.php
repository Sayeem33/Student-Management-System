<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\HTTp\RedirectResponse;
use Illuminate\HTTp\Response;
use App\Models\enrollment;
use App\Models\Batch;
use App\Models\Student;
use Illuminate\View\View;

class enrollmentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $enrollments = Enrollment::with(['batch', 'student'])->get();
    $batches = Batch::pluck('name', 'id');    // For dropdown
    $students = Student::pluck('name', 'id'); // For dropdown
    return view('enrollments.index', compact('enrollments', 'batches', 'students'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $batches = Batch::pluck('name', 'id'); // id => name
    $students = Student::pluck('name', 'id'); // id => name
    return view('enrollments.create', compact('batches', 'students'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enroll_no' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        enrollment::create($request->all());

        return redirect()->route('enrollments.index')
                         ->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = enrollment::find($id);
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit($id)
{
    $enrollment = Enrollment::findOrFail($id);
    $batches = Batch::pluck('name', 'id'); 
    $students = Student::pluck('name', 'id');
    return view('enrollments.edit', compact('enrollment', 'batches', 'students'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'enroll_no' => 'required',
            'batch_id' => 'required',
            'student_id' => 'required',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $enrollment = enrollment::find($id);
        $enrollment->update($request->all());

        return redirect()->route('enrollments.index')
                         ->with('success', 'Enrollment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = enrollment::find($id);
        $enrollment->delete();

        return redirect()->route('enrollments.index')
                         ->with('success', 'Enrollment deleted successfully.');
    }
}
