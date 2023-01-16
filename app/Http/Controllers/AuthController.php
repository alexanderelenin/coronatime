<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\App;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request) :RedirectResponse | View
    {
       $email = $request->email;
       $remember = request()->has('remember-me') ? true : false;
       $fieldName = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
       

        $user = User::where('username', $email)->orWhere('email', $email)->first();

        if($user->email_verified_at!==null){
            $success = auth()->attempt([$fieldName=>$email,'password'=>$request->password],$remember);

            if($success){
                return redirect()->route('worldwide');
            } else {
             return back()->withErrors(['password'=> App::currentLocale()=='en'? 'Password is not correct':'პაროლი არასწორია'])->withInput();
            }
        }else{
            return back()->withErrors(['email'=>'Email is not verified']);
        }
    
    }

    public function store(UserCreateRequest $request) :View | RedirectResponse
    {
        $user = new User();
        $user->username = $request->username;
        $user->email= $request->email;
        $user->password = bcrypt($request->password);
        
        $user->save();
        event(new Registered($user));


        auth()->login($user);
        
        return view('account-verify');

    }

    public function logout() :RedirectResponse
    {
        auth()->logout();

        return redirect('/');
    }
}
