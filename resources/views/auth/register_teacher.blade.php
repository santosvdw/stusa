@extends('layouts.auth')

@section('content')
<main>
    <div class="wrapper">
        <header>    
            <h1>Registreren</h1>
        </header>

    <form action="/registreren" method="post" enctype="multipart/form-data" name="registeren">
        @csrf
        <div class="form-input">
            <label for="voornaam">Voornaam</label>
            <input type="text" name="voornaam" id="voornaam" required>
        </div>
        <div class="form-input">
            <label for="achternaam">Achternaam</label>
            <input type="text" name="achternaam" id="achternaam" required>
        </div>

        <div class="form-input">
            <label for="username">Gebruikersnaam</label>
            <input type="text" name="username" id="username" required>
        </div>

        <hr>

        <div class="form-input">
            <label for="school_id">School</label>
            <select name="school_id" id="school_id">
                <option selected disabled>Kies een school</option>
                @foreach($scholen as $school)
                    <option value="{{$school->id}}">{{$school->naam}}</option>
                @endforeach
            </select>
        </div>


        <hr>

        <div class="form-input">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-input">
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password" required>
        </div>

        <input type="hidden" name="student" value="0">

        <div class="form-input">
            <button type="submit" class="submit-btn">Registreren</button>
        </div>
    </form>
    <a href="/registreren/leerling">Ik ben een leerling</a>
    <a href="/login">Ik heb al een account</a>
    </div>
</main>
@endsection