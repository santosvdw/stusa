@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
    <section class="profile_header">
        <h1>{{$user->username}}</h1>
        <h3>{{$user->voornaam}} {{$user->achternaam}}
        ({{$rol}})
        </h3>
    </section>
<hr>
    <div class="profile_exams">
        @if (count($oefentoetsen) == 0) 
            <h3>
                {{$user->voornaam}} heeft nog geen oefentoetsen geüpload
            </h3>
        @else 
        <h2>Oefentoetsen van {{$user->voornaam}}</h2>

        <div class="oefentoets_list">
        @foreach ($oefentoetsen as $oefentoets)
            @include('partials._oefentoets_list', ['oefentoets' => $oefentoets, 'vakken' => $vakken])        
        @endforeach
        @endif
        </div>
    </div>
    </div>
</main>
@endsection