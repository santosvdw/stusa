@extends('layouts.app')

@section('content')
<main>
    <h1>{{$user->username}}</h1>
    <h3>{{$user->voornaam}} {{$user->achternaam}}
    @if($user->student)
        ({{$user->niveau}} {{$user->jaarlaag}})
    @else
        (Docent)
    @endif
    </h3>

    
    @if (count($oefentoetsen) == 0) 
        <h3>
            {{$user->voornaam}} heeft nog geen oefentoetsen geüpload
        </h3>
    @else 
    <h2>Oefentoetsen van {{$user->voornaam}}</h2>
    @foreach ($oefentoetsen as $oefentoets)
        @include('partials._oefentoets', ['oefentoets' => $oefentoets, 'vakken' => $vakken])        
    @endforeach
    @endif
</main>
@endsection