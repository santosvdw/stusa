@extends('layouts.app')	

@section('content')
<main>
    <div class="wrapper">
@auth
<header>
    <h1>Instellingen</h1>
    <h3>{{Auth::user()->voornaam}} {{Auth::user()->achternaam}}</h3>
</header>

<section class="settings">
    <form action="/user" method="post" name="user" id="user" class="settings-form">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
    <input type="hidden" name="voornaam" id="voornaam" value="{{Auth::user()->voornaam}}">
    <input type="hidden" name="achternaam" id="achternaam" value="{{Auth::user()->achternaam}}">

    <div class="form-input">
        <label for="username">Gebruikersnaam</label>
        <input type="text" name="username" id="username" value="{{Auth::user()->username}}">
    </div>

    <div class="form-input">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{Auth::user()->email}}">
    </div>

    <div class="form-input">
        <label for="school_id">School</label>
        <select name="school_id" id="school_id">
            <option selected value="{{Auth::user()->school_id}}">
                @foreach($schools as $school)
                    @if($school->id == Auth::user()->school_id)
                        {{$school->naam}}
                    @endif
                @endforeach
            </option>
            @foreach($schools as $school)
                @if($school->id != Auth::user()->school_id)
                    <option value="{{$school->id}}">{{$school->school_naam}}</option>
                @endif
            @endforeach
        </select>
    </div>
    
    <div class="form-input">
        <label for="niveau">Niveau</label>
        <select name="niveau" id="niveau">
            <option selected value="{{Auth::user()->niveau}}">
                @foreach($niveaus as $niveau)
                    @if($niveau == Auth::user()->niveau)
                        {{$niveau}}
                    @endif
                @endforeach
            </option>
            @foreach($niveaus as $niveau)
                @if($niveau != Auth::user()->niveau)
                    <option value="{{$niveau}}">{{$niveau}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-input">
    <label for="jaarlaag">Leerjaar</label>
    <select name="jaarlaag" id="jaarlaag">
        <option selected value="{{Auth::user()->jaarlaag}}">
            @foreach($jaarlagen as $jaarlaag)
                @if($jaarlaag == Auth::user()->jaarlaag)
                    {{$jaarlaag}}
                @endif
            @endforeach
        </option>
        @foreach($jaarlagen as $jaarlaag)
            @if($jaarlaag != Auth::user()->jaarlaag)
                <option value="{{$jaarlaag}}">{{$jaarlaag}}</option>
            @endif
        @endforeach
    </select>
    </div>

    <div class="form-input">
        <button class="submit-btn" type="submit" value="Bewerken">Bewerken</button>
    </div>
</form>
    
@if (Route::has('password.request'))
    <section class="change-password">
        <h2>Wachtwoord veranderen</h2>
        <a  href="{{ route('password.request') }}">
            {{ __('Wachtwoord veranderen') }}
        </a>
    </section>
@endif

    <section class="settings-form-account-delete">
        <h2>Account verwijderen</h2>
        <form action="/{{Auth::user()->username}}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <div class="form-input">
                <button type="submit" class="submit-btn red" value="Account verwijderen">Account verwijderen</button>
            </div>
        </form>
    </section>
</section>
@else
    <h1>Je bent niet ingelogd. Klik <a href="/login">hier</a> om je in te loggen bij Stusa.</h1>
@endauth
</div>
</main>

@endsection