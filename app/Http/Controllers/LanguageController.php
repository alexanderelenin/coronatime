<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View;

class LanguageController extends Controller
{
    public function change (string $locale):RedirectResponse
    {
        
       if(in_array($locale, config('app.available_locales')))
       {    
        
            session()->put('lang', $locale);

       }else
       {
        session()->put('lang', 'en');
       }
      
       return redirect()->back();

    }
}
