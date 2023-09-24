<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

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
        return view('home');
    }
    public function calendar()
    {


        $Meeting = Meeting::all();
        return view('meetings.show_calendar', compact('Meeting'));
    }
}
