<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
   
    public function index(): View
{
    $userId = Auth::id(); // get the current user's ID
    $students = Student::where('user_id', $userId)
                ->with('user')
                ->latest()
                ->get();

    return view('students.index', [
        'students' => $students,
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
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'phone' => 'required|string|max:100',
        ]);
    
        $student = new Student();
        $student->name = $data['name'];
        $student->first_name = $data['first_name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->user_id = Auth::id();
        $student->save();
    
        // $request->user()->students()->create($data);
    
        return redirect('/students')->with('success', 'Student added successfully');
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
