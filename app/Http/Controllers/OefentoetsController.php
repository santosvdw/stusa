<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'titel' => 'Oefentoetsen | STUSA',
            'oefentoetsen' => PracticeExam::latest()->get(),
            'vakken' => Course::all(),
            'gebruikers' => User::all(),
        ]);
    }

    // Search for oefentoetsen
    public function search(Request $request)
    {
        // dd(request('search'));
        return view('resultaten', [
            'titel' => 'Zoekresultaten | STUSA',
            'oefentoetsen' => PracticeExam::latest()->filter(request(['search', 'course']))->get(),
            'vakken' => Course::all(),
            'gebruikers' => User::all(),
            // 'oefentoetsen' => PracticeExam::Filter(request(['search']))->get()
        ]);
    }

    // Show a single oefentoets
    public function show($id)
    {
        $oefentoets = PracticeExam::find($id);

        $author = User::find($oefentoets->user_id);

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
                'auteur' => $author,
                'examenstof' => $oefentoets->examenstof ? 'Ja' : 'Nee',
                'vakken' => Course::all(),
            ]);
        }

        // redirect to 404
        return view('404', [
            'vakken' => Course::all(),
            'titel' => '404 PAGINA NIET GEVONDEN | STUSA'
        ]);
    }

    // Create a new oefentoets
    public function create()
    {
        return view('oefentoetsen.upload', [
            'vakken' => Course::all(),
            'titel' => 'Oefentoets uploaden | STUSA',
        ]);
    }

    // Store a new oefentoets
    public function store(Request $request)
    {

        $data = [
            'vak_id' => implode($request->all('vak_id')),
            // 'onderwerp' => implode($request->all('onderwerp')),
            'titel' => implode($request->all('titel')),
            'jaarlaag' => implode($request->all('jaarlaag')),
            'user_id' => implode($request->all('user_id')),
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
        $oefentoets->titel = $data['titel'];
        $oefentoets->user_id = $data['user_id'];
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

    // Edit a oefentoets
    public function edit($id)
    {
        $oefentoets = PracticeExam::find($id);

        if ($oefentoets) {
            return view('oefentoetsen.edit', [
                'oefentoets' => $oefentoets,
                'vakken' => Course::all(),
                'titel' => 'Bewerken | STUSA',
                'auteur' => User::find($oefentoets->user_id),
                'niveaus' => ['VMBO', 'HAVO', 'VWO'],
                'jaarlagen' => ['1', '2', '3', '4', '5', '6'],

            ]);
        }

        // redirect to 404
        // return view('404', ['vakken' => Course::all()]);
    }

    // Update a oefentoets
    public function update(Request $request, $id)
    {
        $oefentoets = PracticeExam::find($id);

        if ($oefentoets) {
            $request['examenstof'] = $request->input('examenstof') ? 1 : 0;
            $oefentoets->update($request->all());
            return redirect()->route('oefentoets.show', $id);
        }

        // redirect 
        OefentoetsController::show($id);
    }

    // Delete a oefentoets
    public function destroy($id)
    {
        $oefentoets = PracticeExam::find($id);

        if ($oefentoets) {
            $oefentoets->delete();
            return view('/', [
                'title' => 'Home',
                'vakken' => Course::all(),
                'titel' => 'Home | STUSA',
            ]);
        }

        // redirect to 404
        return view('404', ['vakken' => Course::all(), 'titel' => '404 PAGINA NIET GEVONDEN | STUSA']);
    }
}
