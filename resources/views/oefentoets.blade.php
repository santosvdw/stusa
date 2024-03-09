<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session()->has('success'))
        <p>
            {{ session()->get('success') }}
        </p>
    @endif
    @include('partials._navigatie', ['vakken' => $vakken])
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
    <br>
</body>
</html>