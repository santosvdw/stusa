@extends('layouts.app')

@section('content')
<main>
<div class="wrapper">
    <header>
        <h1>Oefentoets bewerken</h1>
    </header>
    @auth

    <form method="POST" action="/oefentoets/{{$oefentoets->id}}" name="oefentoets" id="oefentoets" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">

        <div class="form-input">
            <label for="vak_id">Vak</label>
            <select name="vak_id" id="vak_id">
                @foreach($vakken as $vak)
                @if($vak->id == $oefentoets->vak_id)
                <option selected value="{{$vak->id}}">{{$vak->vak_afkorting}}</option>
                @endif
                @endforeach
                @foreach($vakken as $vak)
                @if($vak->id != $oefentoets->vak_id)
                <option value="{{$vak->id}}">{{$vak->vak_afkorting}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="form-input">
            <label for="titel">Titel</label>
            <input type="text" name="titel" placeholder="Schrijf een titel" id="titel" value="{{$oefentoets->titel}}" required>
        </div>
        
        <div class="form-input">
            <label for="beschrijving">Beschrijving</label>
            <textarea type="text" name="beschrijving" id="beschrijving" value="{{$oefentoets->beschrijving}}" placeholder="Geef een beschrijving" required></textarea>
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

<div class="form-input checkbox">
    <label for="examenstof">Examenstof:</label>
    <input type="checkbox" name="examenstof" id="examenstof" @if($oefentoets->examenstof) checked @endif />
</div>
<div class="form-input">
    <label for="opgaven">Opgaven</label>
    <input type="file" name="opgaven" id="opgaven" />
</div>

<div class="form-input">
    <label for="bijlage">Bijlage</label>
    <input type="file" name="bijlage" id="bijlage" />
</div>

<div class="form-input">
    <label for="antwoorden">Antwoorden</label>
    <input type="file" name="antwoorden" id="antwoorden" />
</div>

<div class="form-input">
    <label for="normering">Normering</label>
    <input type="file" name="normering" id="normering" />
</div>

<div class="form-input">
    <label for="lesstof">Lesstof</label>
    <input type="file" name="lesstof" id="lesstof" />
</div>

<div class="form-input">
    <button type="submit" class="submit-btn">Bewerken</button>
</div>
    </form>

    <form action="/oefentoets/{{$oefentoets->id}}" method="post">
    @csrf
    @method('DELETE')
    <div class="form-input">
        <button class="submit-btn red">Verwijderen</button>
    </div>
</form>
@else
<p>Je moet <a href="/login">ingelogd</a> zijn om te kunnen bewerken</p>
@endauth
</div>
</main>

@endsection