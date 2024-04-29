<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function send_reset_password_email(Request $request)
    {
        $request->validate([
            'email' =>'required|email',
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            return response([
                'message' => 'Email Does Not Exist',
                'status' => 'failed',
            ], 404);
        }

        $token = Str::random(60);
        $email = $request->email;

        PasswordReset::create([
            'email' =>$request->email,
            'token' =>$token,
            'created_at' =>Carbon::now()
        ]);

        Mail::send('reset',['token' => $token],function (Message $message) use($email) {
            $message->subject('Reset your password');
            $message->to($email);
        });

        return response([
            'message' => 'Password Reset Email Send Successfully',
            'status' => 'success',
        ], 200);
    }
    public function reset(Request $request,$token)
    {
        // Delete token old than 1 minute
        $formatted = Carbon::now()->subMinute(1)->toDateTimeString();
        PasswordReset::where('created_at',$formatted)->delete();

        $request->validate([
            'password' => 'required|confirmed',
        ]);
        $passwordReset = PasswordReset::where('token',$token)->first();
        if(!$passwordReset)
        {
            return response([
                'message' => 'Token is invalid or expired',
                'status' => 'failed',
            ], 404);
        }
        $user = User::where('email',$passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        // Delete the Token After Reset Password
        PasswordReset::where('email',$user->email)->delete();
        return response([
            'message' => 'Password reset Successfully',
            'status' => 'success',
        ], 200);
    }
}
