<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
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

        return redirect('dashboard');
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
        return view('userUpdate', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            // 'id' => 'required',
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100|unique:users,email',
            'password' => ['required', Rules\Password::defaults()],
        ]);
        // $user = App\Models\User::where('id', $data['id'])->first();
        // pass on id as <input type="hidden"> in form

        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);

        return redirect('dashboard')->with('success', 'user successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->findOrFail($user->id)->delete();

        return redirect('dashboard')->with('success', 'user succesfully deleted');
    }
}
