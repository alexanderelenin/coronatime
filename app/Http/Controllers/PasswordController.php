<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PasswordController extends Controller
{
    public function requestReset():View
    {
        return view('forgot-password');
    }

    public function validateEmail(Request $request) :RedirectResponse | View
    {
     
        $request->validate(['email' => 'required|email']);
         
        $status = Password::sendResetLink(
            $request->only('email')
        );
         
        return $status === Password::RESET_LINK_SENT
        ? view('pass-email-sent')->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
        
    }

    public function reset($token) :View | RedirectResponse
    {
      
        return view('password-reset', ['token' => $token,'email'=> request('email')]);
        
    }

    public function update(UpdatePasswordRequest $request) :RedirectResponse | View
    {
        $attributes = [
            'token' => $request->token,
            'email' => $request->email,
            'password' => $request->password,
        ];
     
       
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
            ? view('password-updated')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}


