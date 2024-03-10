<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\School;
use App\Models\PracticeExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Show profile
    public function show_profile($username)
    {
        $user = User::where('username', $username)->first();
        $oefentoetsen = PracticeExam::where('user_id', $user->id)->get();

        if ($user) {
            return view('profile', [
                'user' => $user,
                'titel' => $user->username . ' | STUSA',
                'vakken' => Course::all(),
                'oefentoetsen' => $oefentoetsen,
            ]);
        }

        // redirect to 404
        return view('404', [
            'vakken' => Course::all(),
            'titel' => '404 PAGINA NIET GEVONDEN | STUSA',
        ]);
    }

    // Show user
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        if ($user) {
            return view('profile', [
                'user' => $user,
                'titel' => $user->username . ' | STUSA',
                'vakken' => Course::all(),
            ]);
        }

        // redirect to 404
        return view('404', [
            'vakken' => Course::all(),
            'titel' => '404 PAGINA NIET GEVONDEN | STUSA',
        ]);
    }


    public function create_student()
    {
        return view('auth.register', [
            'titel' => 'Registreren | STUSA',
            'scholen' => School::all(),
            'niveaus' => ['VMBO', 'HAVO', 'VWO'],
            'vakken' => Course::all(),
        ]);
    }

    public function create_teacher()
    {
        return view('auth.register_teacher', [
            'titel' => 'Registreren | STUSA',
            'scholen' => School::all(),
            'vakken' => Course::all(),
        ]);
    }

    // Store a new user
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
            'student' => $request->student,
        ];

        $gebruiker = User::create($data);

        // Login
        auth()->login($gebruiker);

        return redirect('/', [
            'vakken' => Course::all(),
            'titel' => 'Home | STUSA',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with([
            'vakken' => Course::all(), 'titel' => 'Home | STUSA',
        ]);
    }

    public function edit()
    {
        return view('settings', [
            'vakken' => Course::all(),
            'schools' => School::all(),
            'niveaus' => ['VMBO', 'HAVO', 'VWO'],
            'jaarlagen' => ['1', '2', '3', '4', '5', '6'],
            'titel' => 'Instellingen | STUSA',
        ]);
    }

    public function update(Request $request)
    {
        $id = request()->id;
        $user = User::find($id);

        $user->update($request->all());

        return redirect('/settings')->with([
            'vakken' => Course::all(),
            'titel' => 'Instellingen | STUSA',
            'status' => 'Instellingen opgeslagen!'
        ]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect('/')->with([
            'vakken' => Course::all(),
            'titel' => 'Home | STUSA',
            'status' => 'Account verwijderd!'
        ]);
    }
}
