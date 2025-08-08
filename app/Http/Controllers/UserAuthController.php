<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{

    
// Function to handle user signup
    function signup(Request $request){ 
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success ['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success ['name'] =  $user->name;
        return [
            'success' => true, 
            'result' => $success,
            'message' => 'User registered successfully.'
        ];
    
}

// Function to handle user login
    function login (Request $request) { 
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('MyApp')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user, 'message' => 'Login successful.'], 200);
    
    }
    
}
