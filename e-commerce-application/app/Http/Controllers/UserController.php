<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        if(User::where('email',$request->email)->first()){
            return response([
                'message' => 'Email already registered'
            ],200);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tc' => json_decode($request->tc)
        ]);

        $token = $user->createToken($request->email)->plainTextToken;

        return response([
            'token' => $token,
            'message' => 'User Registration Successfully',
            'status' => 'success',
        ],201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
            'password' =>'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password,$user->password))
        {
            $token = $user->createToken($request->email)->plainTextToken;

            return response([
                'token' => $token,
                'message' => 'User Login Successfully',
                'status' => 'success',
            ],201);
        }
        else
        {
            return response([
                'message' => 'Provided Credentials are invalid',
                'status' => 'failed',
            ],401);
        }
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Successfully',
            'status' => 'success',
        ], 200);
    }
    public function logged_user()
    {
        $loggeduser = auth()->user();
        return response([
            'user' => $loggeduser,
            'message' => 'Logged User Data',
            'status' => 'success',
        ], 200);
    }
    public function changed_password(Request $request)
    {
        $request->validate([
            'password' =>'required|confirmed',
        ]);

        $loggeduser = auth()->user();
        $loggeduser->password = Hash::make($request->password);
        $loggeduser->save();
        return response([
            'message' => 'Password changed successfully',
            'status' => 'success',
        ], 200);
    }

}
