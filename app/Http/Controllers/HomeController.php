<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\School;
use App\Models\PracticeExam;
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
        return view('home', [
            'titel' => 'Home | STUSA',
            'scholen' => School::all(),
            'niveaus' => ['VMBO', 'HAVO', 'VWO'],
            'vakken' => Course::all(),
            'titel' => 'Zoekresultaten | STUSA',
            'oefentoetsen' => PracticeExam::latest()->filter(request(['search', 'course']))->get(),
            'gebruikers' => User::all(),

        ]);
    }
}
