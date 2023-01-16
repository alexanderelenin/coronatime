<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;

class SessionController extends Controller
{
    public function index() :View
    {
        return view('login');
    }


    public function signUp() :View
    {
        return view('sign-up');
    }

    public function world() :View
    {
        return view('worldwide',[
            'countries'=>Country::all()
        ]);
    }
    public function byCountry() :View
    {   
        if(request('search')){
            $countries = Country::where('name', 'like', '%' . request('search') . '%')->get();
        }else{
            $countries = Country::all();
        }

        if(request('column')){
            $countries = Country::orderBy(request('column'), request('order'))->get();
        }
        $order = request('order')=='asc'? 'desc':'asc';

        return view('by-country')->with('countries', $countries)->with('order' , $order);
    }

    
    
}
