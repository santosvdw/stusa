@extends('layouts.app')

@section('content')
<main>
    @auth
    <h1>Uploaden</h1>
    <form method="POST" action="/oefentoets" name="oefentoets" id="oefentoets" enctype="multipart/form-data">
        @csrf
        file:
        {{-- <input type="file" name="file"> --}}
        <br>
        Vak
        <select name="vak_id" id="vak_id">
            @foreach($vakken as $vak)
                <option value="{{$vak->id}}">{{$vak->vak_naam}}</option>
            @endforeach
        </select>
        <br>
        <br>
        Titel:
        <input type="text" name="titel" id="titel"required>
        <br>
        Beschrijving:
        <input type="text" name="beschrijving" id="beschrijving"required>
        <br>
        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
        <input type="hidden" name="school_id" id="school_id" value="{{auth()->user()->school_id}}">
        Niveau:
        <input type="text" name="niveau" id="niveau"required>
        <br>
        Leerjaar:
        <input type="text" name="jaarlaag" id="jaarlaag" required>
        <br>
        Examenstof:
        <input type="checkbox" name="examenstof" id="examenstof" />
        <br>
        Opgaven:
        <input type="file" name="opgaven" id="opgaven" required/>
        <br>
        Bijlage:
        <input type="file" name="bijlage" id="bijlage" />
        <br>
        Antwoorden:
        <input type="file" name="antwoorden" id="antwoorden" required/>
        <br>
        Normering:
        <input type="file" name="normering" id="normering" />
        <br>
        Lesstof:
        <input type="file" name="lesstof" id="lesstof" />
        <br>
        <button type="submit">Upload</button>
    </form>
    @else
    <p>Je moet <a href="/login">ingelogd</a> zijn om te kunnen uploaden</p>
    @endauth
    </main>
@endsection
