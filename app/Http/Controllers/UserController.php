<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'nullable',
            'password' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => 'nullable',
            'password' => 'required',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $user->update($validatedData);

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json('User deleted successfully');
    }
}
