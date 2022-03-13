<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function language()
    {
        $lang = Config::get('app.locale');
        if ($lang == "ar") {
            Request()->session()->put('locale', 'en');
        } else {
            Request()->session()->put('locale', 'ar');
        }
        return back();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('front.index');
    }
}
