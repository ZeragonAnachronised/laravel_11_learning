<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function registration(Request $request) {

        $rules = [
            'name' => 'required|string|alpha|min:4|max:32',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => ['required'], ['string'], Password::min(8)->max(64)->letters()->numbers()
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->save();
            return response()->json([
                'success' => true,
                'user' => $user
            ], 201);
        }
    }
    public function authentication(Request $request) {
        $rules = [
            'email' => 'required|email:rfc,dns',
            'password' => 'required|string'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }
        else if(Auth::attempt($request->all())) {
            $token = $request->user()->createToken('bearer_token');
            return response()->json([
                'success' => true,
                'token' => $token->plainTextToken
            ]);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'wrong login data'
            ], 401);
        }
    }
    public function logout() {
        Auth::user()->currentAccessToken()->delete();
        return response()->json([
            'success' => true,
            'message' => 'logged out'
        ], 200);
    }
    public function allout() {
        Auth::user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'logged out of all sessions'
        ], 200);
    }
    public function destroy() {
        Auth::user()->delete();
        return response()->json([
            'success' => true,
            'message' => 'account deleted'
        ], 200);
    }
}
