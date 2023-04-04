<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;


class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $role_id = Auth::role_id();
        // $users = User::where('role', $role_id)
        //                     ->latest()
        //                     ->get();
        
        
        // return view('dashboard', ['users' => $users]);
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
            'password' => ['required', Rules\Password::defaults()]
            // 'password' => Hash::make($request->password)
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('dashboard')->with('success', 'user added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $users)
    {
        

        // get all teachers (role_id = NULL) when an admin logs in


        $id = Auth::User()->role_id;

        
         if ($id == 3) {
            $users = User::All()->where('role_id', NULL);
            return view('dashboard', ['users' => $users]); 
         } else {
            return view('dashboard');
         }

         

        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'password' => ['required', Rules\Password::defaults()],
        ]);


        $user->password = Hash::make($data['password']);
        $user->update($data);

        return redirect('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('dashboard');
    }
}
