@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
    @auth
    <header>
        <h1>Uploaden</h1>
    </header>
    <form method="POST" action="/oefentoets" name="oefentoets" id="oefentoets" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
        <input type="hidden" name="school_id" id="school_id" value="{{auth()->user()->school_id}}">  

        <div class="form-input">
            <label for="vak_id">Vak</label>
            <select name="vak_id" id="vak_id">
                <option value="" disabled selected>Kies een vak</option>
                @foreach($vakken as $vak)
                <option value="{{$vak->id}}">{{$vak->vak_afkorting}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-input">
            <label for="titel">Titel</label>
            <input type="text" name="titel" id="titel" placeholder="Schrijf een titel" required>
        </div>

        <div class="form-input">
            <label for="beschrijving">Beschrijving</label>
            <textarea type="text" name="beschrijving" id="beschrijving" placeholder="Geef een beschrijving" required></textarea>
        </div>

        <div class="form-input">
            <label for="niveau">Niveau</label>
            <select name="niveau" id="niveau">
                <option disabled selected>Kies een niveau</option>
                <option value="VMBO">VMBO</option>
                <option value="HAVO">HAVO</option>
                <option value="VWO">VWO</option>
            </select>
        </div>

        <div class="form-input">
            <label for="jaarlaag">Jaarlaag</label>
            <select name="jaarlaag" id="jaarlaag">
                <option disabled selected>Kies een jaarlaag</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="form-input checkbox">
            <label for="examenstof">Examenstof</label>
            <input type="checkbox" name="examenstof" id="examenstof">
        </div>

        <hr>

        <div class="form-input">
            <label for="opgaven">Opgaven</label>
            <input type="file" name="opgaven" id="opgaven" required>
        </div>

        <div class="form-input">
            <label for="bijlage">Bijlage</label>
            <input type="file" name="bijlage" id="bijlage">
        </div>

        <div class="form-input">
            <label for="antwoorden">Antwoorden</label>
            <input type="file" name="antwoorden" id="antwoorden" required>
        </div>

        <div class="form-input">
            <label for="normering">Normering</label>
            <input type="file" name="normering" id="normering">
        </div>

        <div class="form-input">
            <label for="lesstof">Lesstof</label>
            <input type="file" name="lesstof" id="lesstof">
        </div>
    
        <div class="form-input">
            <button class="submit-btn" type="submit">Uploaden</button>
        </div>
    </form>
    @else
    <p>Je moet <a href="/login">ingelogd</a> zijn om te kunnen uploaden</p>
    @endauth
    </div>
    </main>
@endsection
