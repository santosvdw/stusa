@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <header>
            <h1>{{$oefentoets->titel}}</h1>
        </header>

        <section class="oefentoets" id="{{$oefentoets->id}}_card">
            <div class="card">
                <div class="card_photo">
                    <img src="{{asset('assets/doc.png')}}" alt="document">
                </div>
                <div class="card_content">
                    <p class="card_description">{{$oefentoets->beschrijving}}</p>
                    <div class="card_content_info">
                        <p class="card_content_info_author"> Van {{$auteur->voornaam}} {{$auteur->achternaam}}&nbsp;|&nbsp;</p>
                        <p class="card_content_info_niveau">{{$oefentoets->jaarlaag}} {{$oefentoets->niveau}}</p>
                        @if($oefentoets->examenstof == 1)
                            <p class="card_content_info_examenstof">Examenstof</p>
                        @endif
                    </div>
                </div>
            </div>
            @auth

            <section class="oefentoets_download">
                <h3>Downloaden:</h3>
                <div class="oefentoets_buttons">
                    <a href="/storage/{{$oefentoets->opgaven}}" class="card_download_btn" download="opgaven_{{$oefentoets->titel}}">Opgaven</a>
                    <a href="/storage/{{$oefentoets->antwoorden}}" class="card_download_btn" download="antwoorden_{{$oefentoets->titel}}">Antwoorden</a>
                    @if($oefentoets->bijlage)
                    <a href="/storage/{{$oefentoets->bijlage}}" class="card_download_btn" download="bijlage_{{$oefentoets->titel}}">Bijlage</a>
                    @endif
                    @if($oefentoets->normering)
                    <a href="/storage/{{$oefentoets->normering}}" class="card_download_btn" download="normering_{{$oefentoets->titel}}">Normering</a>
                    @endif
                    @if($oefentoets->lesstof)
                    <a href="/storage/{{$oefentoets->lesstof}}" class="card_download_btn" download="lesstof_{{$oefentoets->titel}}">Lesstof</a>
                    @endif
                </div>
            </section>
            @else 
            <p>Je moet <a href="/login">ingelogd</a> zijn om de bijbehorende bestanden te kunnen downloaden.</p>
            @endauth

            <div class="bewerken">
                @auth
                @if(Auth::user()->id == $oefentoets->user_id)
                <a href="/oefentoets/{{$oefentoets->id}}/bewerken"><button class="submit-btn">Bewerken</button></a>
                @endif
                @endauth
            </div>
        </section>
    </div>
</main>
@endsection