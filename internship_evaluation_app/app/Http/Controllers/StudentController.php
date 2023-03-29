<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('students.index', [
            'students' => Student::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
        ]);

        $request->user()->students()->create($validated);

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        // $this->authorize('update', $student);

        // return view('students.edit', [
        //     'student' => $student,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        // $this->authorize('update', $student);

        // $validated = $request->validate([
        //     'name' => 'required|string|max:100',
        //     'first_name' => 'required|string|max:100',
        //     'email' => 'required|string|max:100',
        //     'phone' => 'required|string|max:100',
        // ]);

        // $student->update($validated);

        // return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
