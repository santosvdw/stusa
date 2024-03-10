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

    <form action="/registreren" method="post" enctype="multipart/form-data" name="registreren">
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
            <option selected disabled>Kies een school</option>
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
        <input type="hidden" name="student" value="false">
        <input type="submit" value="Registreren">
    </form>
    <a href="/registreren/leerling">Ik ben een leerling</a>
    <a href="/login">Ik heb al een account</a>

</body>
</html>