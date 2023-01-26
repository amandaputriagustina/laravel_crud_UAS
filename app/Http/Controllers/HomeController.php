<?php

namespace App\Http\Controllers;

use App\Models\hp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hps = hp::all();
        return view('hps.index',compact('hps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
