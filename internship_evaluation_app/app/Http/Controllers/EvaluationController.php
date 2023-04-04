<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
   
    public function index(): View
    {
        $userId = Auth::id(); // get the current user's ID
        $evaluations = Evaluation::where('user_id', $userId)
            ->with('user')
            ->latest()
            ->get();

        return view('evaluations.index', [
            'evaluations' => $evaluations,
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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
        ]);
    
        $evaluation = new Evaluation();
        $evaluation->title = $data['title'];
        $evaluation->description = $data['description'];
        $evaluation->date = $data['date'];
        $evaluation->user_id = Auth::id();
        $evaluation->save();
    
        return redirect('/evaluations')->with('success', 'Evaluation added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        return view('evaluations.edit', compact('evaluation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
        ]);
    
        $evaluation->update($data);
    
        return redirect('/evaluations')->with('success', 'Evaluation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        $evaluation->delete();
        
        return redirect('/evaluations')->with('success', 'Evaluation deleted successfully');
    }
}