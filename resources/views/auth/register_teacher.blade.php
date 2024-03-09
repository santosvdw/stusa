<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registreren</title>
</head>
<body>
    <h1>Registreren</h1>

    <form action="/register/docent" method="post" enctype="multipart/form-data" name="registeren">
        @csrf
        Voornaam:
        <input type="text" name="voornaam" id="voornaam" required>
        <br>
        Achternaam:
        <input type="text" name="achternaam" id="achternaam" required>
        <br>
        Gebruikersnaam:
        <input type="text" name="username" id="username" required>
        <br>
        <hr>
        School:
        <select name="school_id" id="school_id">
            @foreach($scholen as $school)
                <option value="{{$school->id}}">{{$school->naam}}</option>
            @endforeach
        </select>
        <br>
        <hr>
        Email:
        <input type="email" name="email" id="email" required>
        <br>
        Wachtwoord:
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Registreren">
    </form>
</body>
</html>