@extends('layouts.app')

@section('content')
    <h1>Oefentoets</h1>
    Onderwerp: {{$oefentoets->onderwerp}}
    <br>
    Titel: {{$oefentoets->titel}}
    <br>
    Beschrijving: {{$oefentoets->beschrijving}}
    <br>
    Niveau: {{$oefentoets->niveau}}
    <br>
    Leerjaar: {{$oefentoets->jaarlaag}}
    <br>
    @if($oefentoets->examenstof == 0)
        Examenstof: Nee
    @else
        Examenstof: Ja
    @endif
    @auth
    <br>
    Download de opgaven: <a download href="/storage/{{$oefentoets->opgaven}}">Klik hier</a>
    <br>
    Download de bijlage: <a download href="/storage/{{$oefentoets->bijlage}}">Klik hier</a>
    <br>
    Download de antwoorden: <a download href="/storage/{{$oefentoets->antwoorden}}">Klik hier</a>
    <br>
    @if($oefentoets->normering)
        Download het normeringsformulier: <a download href="/storage/{{$oefentoets->normering}}">Klik hier</a>
    @endif
    <br>
    @if($oefentoets->lesstof)
        Download de lesstof: <a download href="/storage/{{$oefentoets->lesstof}}">Klik hier</a>
    @endif
    @else
    <p>Je moet <a href="/login">ingelogd</a> zijn om de bestanden te kunnen downloaden</p>
    @endauth
    <br>
@endsection