<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User; 
use Illuminate\Auth\Events\PasswordReset;

class ForgotPasswordController extends Controller
{
    public function showEmailForm()
    {
        return view('forgot-password.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success', 'Link sent to your email.')
                    : back()->withErrors(['email' => __($status)]);
    }

    public function showResetForm(Request $request ,$token)
    {
        return view('forgot-password.reset-password', [
            'token' => $token,
            'email' => $request->email, 
        ]);
    
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.loginform')->with('success', 'Password has been reset successfully.')
            : back()->withErrors(['email' => [__($status)]]);
    }

}
