<!DOCTYPE html>
<html lang="en">
@if(session()->has('success'))
    <p>
        {{ session()->get('success') }}
    </p>
@endif
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include('partials._navigatie', ['vakken' => $vakken])
<h1>Uploaden</h1>

<form method="POST" action="/oefentoets" name="oefentoets" id="oefentoets" enctype="multipart/form-data">
    @csrf
    file:
    {{-- <input type="file" name="file"> --}}
    <br>
    Vak id:
    <input type="text" name="vak_id" id="vak_id"required>
    <br>
    Onderwerp:
    <input type="text" name="onderwerp" id="onderwerp"required>
    <br>
    Titel:
    <input type="text" name="titel" id="titel"required>
    <br>
    Beschrijving:
    <input type="text" name="beschrijving" id="beschrijving"required>
    <br>
    Gebruiker id:
    <input type="text" name="gebruiker_id" id="gebruiker_id"required>
    <br>
    School id:
    <input type="text" name="school_id" id="school_id"required>
    <br>
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
</body>
</html>