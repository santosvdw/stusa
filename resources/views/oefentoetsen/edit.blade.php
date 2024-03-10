@extends('layouts.app')

@section('content')
    <h1>Oefentoets bewerken</h1>
    @auth

    <form method="POST" action="/oefentoets/{{$oefentoets->id}}" name="oefentoets" id="oefentoets" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        Vak id:
        <input type="text" name="vak_id" id="vak_id" value="{{$oefentoets->vak_id}}" required>
        <br>
        Titel:
        <input type="text" name="titel" id="titel" value="{{$oefentoets->titel}}" required>
        <br>
        Beschrijving:
        <input type="text" name="beschrijving" id="beschrijving" value="{{$oefentoets->beschrijving}}" required>
        <br>
       
        Niveau:
        <input type="text" name="niveau" id="niveau" value="{{$oefentoets->niveau}}" required>
        <br>
        Leerjaar:
        <input type="text" name="jaarlaag" id="jaarlaag" value="{{$oefentoets->jaarlaag}}" required>
        <br>
        Examenstof:
        <input type="checkbox" name="examenstof" id="examenstof" @if($oefentoets->examenstof) checked @endif />
        <br>
        Opgaven:
        <input type="file" name="opgaven" id="opgaven" />
        <br>
        Bijlage:
        <input type="file" name="bijlage" id="bijlage" />
        <br>
        Antwoorden:
        <input type="file" name="antwoorden" id="antwoorden" />
        <br>
        Normering:
        <input type="file" name="normering" id="normering" />
        <br>
        Lesstof:
        <input type="file" name="lesstof" id="lesstof" />
        <br>
        <input type="submit" value="Bewerken">
    </form>

    <form action="/oefentoets/{{$oefentoets->id}}" method="post">
    @csrf
    @method('DELETE')
    <input type="submit" value="Verwijderen">
</form>
@else
<p>Je moet <a href="/login">ingelogd</a> zijn om te kunnen bewerken</p>
@endauth
@extends('layouts.app')

@section('content')