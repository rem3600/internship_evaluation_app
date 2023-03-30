<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('dashboard');
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
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();

        return redirect('dashboard')->with('success', 'user added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserTable $userTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserTable $userTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserTable $userTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTable $userTable)
    {
        //
    }
}
