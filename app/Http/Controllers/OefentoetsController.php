<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\PracticeExam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OefentoetsController extends Controller
{
    // Show all oefentoetsen
    public function index()
    {
        return view('oefentoetsen', [
            'title' => 'Oefentoetsen',
            'oefentoetsen' => PracticeExam::latest()->get(),
            'vakken' => Course::all(),
        ]);
    }

    // Search for oefentoetsen
    public function search(Request $request)
    {
        // dd(request('search'));
        return view('resultaten', [
            'title' => 'Oefentoetsen',
            'oefentoetsen' => PracticeExam::latest()->filter(request(['search', 'course']))->get(),
            'vakken' => Course::all(),
            // 'oefentoetsen' => PracticeExam::Filter(request(['search']))->get()
        ]);
    }

    // Show a single oefentoets
    public function show($id)
    {
        $oefentoets = PracticeExam::find($id);

        if ($oefentoets) {
            return view('oefentoets', [
                'oefentoets' => $oefentoets,
                'titel' => $oefentoets->titel,
                'onderwerp' => $oefentoets->onderwerp,
                'beschrijving' => $oefentoets->beschrijving,
                'jaarlaag' => $oefentoets->jaarlaag,
                'niveau' => $oefentoets->niveau,
                'opgaven' => $oefentoets->opgaven,
                'bijlage' => $oefentoets->bijlage,
                'antwoorden' => $oefentoets->antwoorden,
                'normering' => $oefentoets->normering,
                'lesstof' => $oefentoets->lesstof,
                'examenstof' => $oefentoets->examenstof ? 'Ja' : 'Nee',
                'vakken' => Course::all(),
            ]);
        }

        // redirect to 404
        return view('404');
    }

    // Create a new oefentoets
    public function create()
    {
        return view('oefentoetsen.upload', [
            'title' => 'Oefentoets uploaden',
            'vakken' => Course::all(),
        ]);
    }

    // Store a new oefentoets
    public function store(Request $request)
    {

        $data = [
            'vak_id' => implode($request->all('vak_id')),
            'onderwerp' => implode($request->all('onderwerp')),
            'titel' => implode($request->all('titel')),
            'gebruiker_id' => implode($request->all('gebruiker_id')),
            'jaarlaag' => implode($request->all('jaarlaag')),
            'gebruiker_id' => implode($request->all('gebruiker_id')),
            'school_id' => implode($request->all('school_id')),
            'niveau' => implode($request->all('niveau')),
            'examenstof' => $request->input('examenstof') ? true : false, // 'examenstof' => 'required
            'beschrijving' => implode($request->all('beschrijving')),
            'opgaven' => $request->file('opgaven')->store('files', 'public'),
            'bijlage' => $request->file('bijlage')->store('files', 'public'),
            'antwoorden' => $request->file('antwoorden')->store('files', 'public'),
        ];

        if ($request->hasFile('normering')) {
            $data['normering'] = $request->file('normering')->store('files', 'public');
        }
        if ($request->hasFile('lesstof')) {
            $data['lesstof'] = $request->file('lesstof')->store('files', 'public');
        }


        $oefentoets = new PracticeExam();
        $oefentoets->vak_id = $data['vak_id'];
        $oefentoets->onderwerp = $data['onderwerp'];
        $oefentoets->titel = $data['titel'];
        $oefentoets->gebruiker_id = $data['gebruiker_id'];
        $oefentoets->jaarlaag = $data['jaarlaag'];
        $oefentoets->school_id = $data['school_id'];
        $oefentoets->niveau = $data['niveau'];
        $oefentoets->examenstof = $data['examenstof'];
        $oefentoets->beschrijving = $data['beschrijving'];
        $oefentoets->opgaven = $data['opgaven'];
        $oefentoets->bijlage = $data['bijlage'];
        $oefentoets->antwoorden = $data['antwoorden'];
        if ($request->hasFile('normering')) {
            $oefentoets->normering = $data['normering'];
        }
        if ($request->hasFile('lesstof')) {
            $oefentoets->lesstof = $data['lesstof'];
        }
        $oefentoets->save();

        $id = $oefentoets->id;
        // dd($data);

        // Oefentoets::create($formFields);
        // Oefentoets::create($data);
        // 'examenstof' => implode($request->all('examenstof')),

        return redirect()->route('oefentoets.show', $id);
    }
}
