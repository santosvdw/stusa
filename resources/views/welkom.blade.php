@extends('layouts.auth')

@section('content')
<main>
    <div class="wrapper">
        <header><h1>Welkom bij Stusa!</h1></header>
        <div class="intro">Een website voor een door leerlingen waar je oefentoetsen voor al je toetsen kan vinden</div>
        <div class="links">
            <div class="blocks">
                <a class="block login" href="/login"><i class="bi bi-box-arrow-in-right"></i><p>Inloggen</p></a>
                <a class="block" href="/registreren/leerling"><p>Registeren (leerling)</p></a>
                <a class="block" href="/registreren/docent"><p>Registeren (docent)</p></a>
                <a class="block" href="/oefentoetsen"><p>Oefentoetsen bekijken</p></a>
            </div>
        </div>
    </div>
</main>