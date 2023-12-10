<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Display user by name
    public function getUserByName($name)
    {
        $user = User::with('products')->where('name', $name)->get();
        return response()->json($user);
    }

    // Create a new user
    public function createUser(Request $request)
    {
        /* Validate the data */
        $validatedData = $request->validate([
            'name' => 'required|string|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|string',
            'zone' => 'required|string',
        ]);
        
        $user = User::create($validatedData);

        return response()->json($user, 201);    /* 201 means "Created" */
    }

    // Update an existing user
    public function updateUser(Request $request, $name)
    {
        /* Look for the user in the database */
        $user = User::where('name', $name)->first();

        /* Verify if the user exists */
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        /* Validate the data */
        $validatedData = $request->validate([
            'name' => [
                'string',
                'required',
                //Rule::unique('user')->ignore($user->id),
                Rule::in([$user->name])
            ],
            'email' => [
                'email',
                Rule::unique('user')->ignore($user->id)
            ],
            'password' => 'string',
            'zone' => 'string',
        ]);
        
        $user->update($validatedData);

        return response()->json($user, 200);    /* 200 means "OK" */
    }

    public function deleteUser($name){
        /* Look for the user in the database */
        $user = User::where('name', $name)->first();

        /* Verify if the user exists */
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
    
}
