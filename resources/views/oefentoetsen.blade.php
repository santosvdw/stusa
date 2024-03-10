@extends('layouts.app')

@section('content')
    <h1>Oefentoetsen</h1>
    @if(session()->has('success'))
        <p>
            {{ session()->get('success') }}
        </p>
    @endif

    <a href="/oefentoets/uploaden">Uploaden</a>

    
    @if (count($oefentoetsen) == 0) 
        <h3>
            Er zijn geen oefentoetsen
        </h3>
    @endif
    
    
    @foreach ($oefentoetsen as $oefentoets)
        @include('partials._oefentoets', ['oefentoets' => $oefentoets, 'vakken' => $vakken])        
    @endforeach
@endsection