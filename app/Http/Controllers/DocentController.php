<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocentController extends Controller
{
    // Show all teachers
    public function index()
    {
        return view('docenten', [
            'title' => 'Docenten',
            'vakken' => Course::all(),
        ]);
    }

    // Show a single teacher
    public function show($id)
    {
        $docent = Teacher::find($id);

        if ($docent) {
            return view('docent', [
                'docent' => $docent,
                'username' => $docent->username,
                'id' => $docent->id,
                'voornaam' => $docent->voornaam,
                'achternaam' => $docent->achternaam,
                'email' => $docent->email,
                'school_id' => $docent->school_id,
            ]);
        }

        // redirect to 404
        return view('404');
    }

    // Create a new teacher
    public function create()
    { //wrong link
        return view('auth.register_teacher', [
            'scholen' => School::all(),
            'vakken' => Course::all(),
        ]);
    }

    // Store a new teacher
    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'password' => $request->password,
            'school_id' => $request->school_id,
        ];

        Teacher::create($data);

        return redirect('/');
    }
}
