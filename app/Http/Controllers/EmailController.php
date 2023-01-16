<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailController extends Controller
{
    public function index():View
    {
        return view('account-verify');
    }

    public function verify(EmailVerificationRequest $request):View
    {
        
        $request->fulfill();
         auth()->logout();
         
         return view('account-confirmed');

       
       
    }
}
