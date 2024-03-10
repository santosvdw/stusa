@extends('layouts.app')	

@section('content')
<main>
@auth
    <h1>Hoi, {{Auth::user()->voornaam}}</h1>
    <h3>{{Auth::user()->voornaam}} {{Auth::user()->achternaam}}</h3>

    <form action="/user" method="post" name="user" id="user">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
    <input type="hidden" name="voornaam" id="voornaam" value="{{Auth::user()->voornaam}}">
    <input type="hidden" name="achternaam" id="achternaam" value="{{Auth::user()->achternaam}}">
    <input type="text" name="username" id="username" value="{{Auth::user()->username}}">
    <input type="text" name="email" id="email" value="{{Auth::user()->email}}">
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

    <input type="submit" value="Bewerken">
</form>
    
    @if (Route::has('password.request'))
        <a  href="{{ route('password.request') }}">
            {{ __('Wachtwoord veranderen') }}
        </a>
    @endif

    <form action="/{{Auth::user()->username}}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{Auth::user()->id}}">
    <input type="submit" value="Account verwijderen">
    </form>

@else
    <h1>Je bent niet ingelogd. Klik <a href="/login">hier</a> om je in te loggen bij Stusa.</h1>
@endauth
</main>

@endsection