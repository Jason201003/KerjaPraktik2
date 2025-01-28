<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();  // Retrieve all users
        return view('admin.users.index', compact('users'));  // Return view with users data
    }

    public function create()
    {
        return view('admin.users.create');  // Display form to create user
    }

    public function store(Request $request)
    {
        // Validate and store new user
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'usertype' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'nullable|string|max:15',
            'tgl_lahir' => 'nullable|date',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);
        return redirect()->route('admin.users.index')->with('Sucess', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);  // Find user by ID
        return view('admin.users.edit', compact('user'));  // Return edit form
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);  // Find user by ID

        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'usertype' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:15',
            'tgl_lahir' => 'nullable|date',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update the user
        $user->update($validated);

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);  // Find user by ID
        $user->delete();  // Delete the user
        return redirect()->route('admin.users.index');
    }
}
