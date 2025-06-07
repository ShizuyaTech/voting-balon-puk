<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $candidates = Candidate::orderBy('votes', 'desc')->get();
        $validatedUserId = $request->session()->get('validated_user_id');
        return view('home', compact('candidates', 'validatedUserId'));
    }
}
