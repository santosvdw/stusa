@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">        
        <header>
            <h1>Oefentoetsen</h1>
        </header>

        <div class="blocks">
            <a class="block small" href="/oefentoets/uploaden">Uploaden</a>
        </div>
        
        @if (count($oefentoetsen) == 0) 
        <h3 class="no_exams_message">
            Er zijn geen oefentoetsen, upload er zelf een!
        </h3>
        @endif
        
        <div class="oefentoets_list">
            @foreach ($oefentoetsen as $oefentoets)
            @include('partials._oefentoets_list', ['oefentoets' => $oefentoets, 'vakken' => $vakken, 'gebruikers' => $gebruikers])
            @endforeach  
        </div>
    </div>
</main>
@endsection