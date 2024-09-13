<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function index() {
        if (Auth::check() && Auth::user()->is_admin !== 1) {
            return redirect()->route('dashboard');
        }

        $users = User::all();
        return view('users.index', [
            'title' => 'Users',
            'users' => $users
        ]);
    }

    public function create() {
        return view('users.create', [
            'title' => 'Create New'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,username',
            'password' => 'required|string|min:8',
            'level' => 'required|in:0,1',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'is_admin' => $validatedData['level'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($username) {
        $user = User::where('username', $username)->firstOrFail();
        return view('users.edit', [
            'title' => 'Edit user',
            'user' => $user
        ]);
    }

    public function updateUserData(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|unique:users,username,'.$id,
            'level' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validatedData['name'];
        $user->is_admin = $validatedData['level'];
        if ($request->has('username')) {
            $user->username = $validatedData['username'];
        }
        $user->save();

        return redirect()->route('users.edit', ['username' => $user->username])->with('success', 'User updated successfully.');
    }

    public function updatePassword(Request $request, $id) {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'password_confirmation' => 'required|string|min:8',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('users.edit', ['username' => $user->username])->with('success', 'Password updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to delete the user: ' . $e->getMessage());
        }
    }
}
