<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        $body = json_decode($request->getContent(), true);

        /* Validate the data */
        $validator = Validator::make($body, [
            'name' => 'required|string|unique:user',
            'email' => 'required|email|unique:user',
            'password' => 'required|string',
            'zone' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }
        
        $user = User::create($body);

        return response()->json($user, 201);    /* 201 means "Created" */
    }

    // Update an existing user
    public function updateUser(Request $request, $name)
    {
        $body = json_decode($request->getContent(), true);

        /* Look for the user in the database */
        $user = User::where('name', $name)->first();

        /* Verify if the user exists */
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        /* Validate the data */
        $validator = Validator::make($body, [
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

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }
        
        $user->update($body);

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


    public function login(Request $request) {

        $body = json_decode($request->getContent(), true);

        $validator = Validator::make($body, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }

        $user = User::where('email', $body['email'])->first();

        if (! $user || ! Hash::check($body['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        $token = $user->createToken('Auth Token');
        return ['token' => $token->plainTextToken];
        //$request->user()->createToken($request->token_name);
     
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user = Auth::user();

        $user->tokens()->delete();

        return redirect('/');

    }
    
}
