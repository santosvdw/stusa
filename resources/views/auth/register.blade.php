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

    <form action="/registreren" method="post" enctype="multipart/form-data" name="registeren">
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
        Jaarlaag:
        <select name="jaarlaag" id="jaarlaag">
            <option disabled selected>Kies een jaarlaag</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <br>
        Niveau:
        <select name="niveau" id="niveau">
            <option disabled selected>Kies een niveau</option>
            <option value="VMBO">VMBO</option>
            <option value="HAVO">HAVO</option>
            <option value="VWO">VWO</option>
        </select>
        <br>
        <hr>
        Email:
        <input type="email" name="email" id="email" required>
        <br>
        Wachtwoord:
        <input type="password" name="password" id="password" required>
        <br>
        <input type="hidden" name="student" value="true">
        <input type="submit" value="Registreren">
    </form>
    <a href="/registreren/docent">Ik ben een docent</a>
    <a href="/login">Ik heb al een account</a>

</body>
</html>