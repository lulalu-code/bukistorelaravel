<?php

namespace App\Http\Controllers;

use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        // Get all the users
        $users = User::all();
        return response()->json($users);
    }

    // Display a user by name
    public function getUserByName($name)
    {
        // Get the user and their products
        $user = User::with('products')->where('name', $name)->first()->makeHidden(['email_verified_at','created_at','updated_at']);
        return response()->json($user);
    }

    // Update an existing user
    public function updateUser(Request $request, $name)
    {
        try {
            // Check if the user making the request is the user to update
            if ($request->user()->name != $name) {
                return response()->json([
                    'status' => false,
                    'message' => 'You don\'t have authorization to update this user'
                ], 403);    /* 403 means "Forbidden" */
            }
            // Look for the user instance in the database
            $user = User::where('name', $name)->first();

            // Verify if the user exists
            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            $body = json_decode($request->getContent(), true);

            // Process image as it can arrive as a new image object or as a string
            //if ($body['profile_image'] instanceof ArrayObject && array_key_exists('value', $body['profile_image'])) {
            if (!is_string($body['profile_image']) && array_key_exists('value', $body['profile_image'])) { // Check if the image is arriving as a new image object or as a string
                $imageString = $body['profile_image']['value'];
                $imageType = $body['profile_image']['filetype'];
                $imageData = 'data:' . $imageType . ';base64,' . $imageString;
                $body['profile_image'] = $imageData;
            }

            // Validate the data
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
            
            // Update the user inside the database
            $user->update($body);

            return response()->json([
                'status' => true,
                'message' => 'User Updated Successfully'
            ], 200);    /* 200 means "OK" */

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);    /* 500 means "Internal Server Error" */
        }
    }

    // Delete a user
    public function deleteUser(Request $request, $name){

        try {
            // Check if the user making the request is the user to update
            if ($request->user()->name != $name) {
                return response()->json([
                    'status' => false,
                    'message' => 'You don\'t have authorization to update this user'
                ], 403);    /* 403 means "Forbidden" */
            }

            /* Look for the user in the database */
            $user = User::where('name', $name)->first();

            /* Verify if the user exists */
            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }

            $user->delete();

            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);    /* 500 means "Internal Server Error" */
        }
    }


    /*public function login(Request $request) {

        $body = json_decode($request->getContent(), true);

        // Validate the data
        $validator = Validator::make($body, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 means "Unprocessable Entity"
        }

        // Look for the user in the database
        $user = User::where('email', $body['email'])->first();

        // Check user's credentials
        if (! $user || ! Hash::check($body['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        // Create authentication token for the user and return it
        $token = $user->createToken('Auth Token');
        return ['token' => $token->plainTextToken];
     
    }*/

    /*public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $user = Auth::user();

        $user->tokens()->delete();

        return redirect('/');

    }*/
    
}
