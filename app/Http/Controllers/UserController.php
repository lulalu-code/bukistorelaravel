<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
}
