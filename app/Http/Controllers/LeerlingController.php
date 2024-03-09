<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeerlingController extends Controller
{
    // Show all students
    public function index()
    {
        return view('leerlingen', [
            'title' => 'Leerlingen',
            'vakken' => Course::all(),
        ]);
    }

    // Show a single student
    public function show($id)
    {
        $leerling = Student::find($id);

        if ($leerling) {
            return view('leerling', [
                'leerling' => $leerling,
                'username' => $leerling->username,
                'id' => $leerling->id,
                'voornaam' => $leerling->voornaam,
                'achternaam' => $leerling->achternaam,
                'email' => $leerling->email,
                'school_id' => $leerling->school_id,
                'jaarlaag' => $leerling->jaarlaag,
                'niveau' => $leerling->niveau,
                'klas' => $leerling->klas,
                'profiel' => $leerling->profiel,
                'profielfoto' => $leerling->profielfoto,
            ]);
        }

        // redirect to 404
        return view('404');
    }

    // Create a new student
    public function create()
    {
        return view('auth.register', [
            'scholen' => School::all(),
            'vakken' => Course::all(),
        ]);
    }

    // Store a new student
    public function store(Request $request)
    {
        $data = [
            'username' => $request->username,
            'voornaam' => $request->voornaam,
            'achternaam' => $request->achternaam,
            'email' => $request->email,
            'school_id' => $request->school_id,
            'jaarlaag' => $request->jaarlaag,
            'niveau' => $request->niveau,
            'klas' => $request->klas,
            'profiel' => $request->profiel,
            'password' => bcrypt($request->password),
        ];

        $leerling = Student::create($data);

        return redirect('/');
    }
}
