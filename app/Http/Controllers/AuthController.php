<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    // Create a New User
    public function createUser(Request $request)
    {
        try {
            $body = json_decode($request->getContent(), true);

            // Validate the data
            $validateUser = Validator::make($body, 
            [
                'name' => 'required|string|unique:user',
                'email' => 'required|email|unique:user',
                'password' => 'required|string',
                'zone' => 'required|string',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            // Process the image -> transform it to base64
            $imageData = 'data:' . $body['profile_image']['filetype'] . ';base64,' . $body['profile_image']['value'];
            $body['profile_image'] = $imageData;

            // Create the user in the database
            $user = User::create($body);

            // Authenticate the user
            Auth::login($user);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("AUTH TOKEN")->plainTextToken
            ], 201);    /* 201 means "Created" */

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);    /* 500 means "Internal Server Error" */
        }
    }

    // Login the user
    public function loginUser(Request $request)
    {

        $body = json_decode($request->getContent(), true);

        try {
            // Validate the data
            $validateUser = Validator::make($body, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            // Return error in case the authentication fails
            if(!Auth::attempt($body)){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            // Look for the user in the database
            $user = User::where('email', $body['email'])->first();

            // Check user's credentials
            if (! $user || ! Hash::check($body['password'], $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            } /*else {
                $request->session()->regenerate();
            }*/

            // Create authentication token for the user and return it 
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("AUTH TOKEN")->plainTextToken,
                'author_name' => $user->name
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    // Logout the user
    public function logoutUser(Request $request) {

        try {
            //$request->user()->tokens()->delete();

            // Get bearer token from the request
            $accessToken = $request->bearerToken();
            
            // Get access token from database
            $token = PersonalAccessToken::findToken($accessToken);

            // Revoke token
            $token->delete();

            //Auth::user()->tokens()->delete();
            $request->user()->currentAccessToken()->delete();

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);    /* 500 means "Internal Server Error" */
        }
    }
}
