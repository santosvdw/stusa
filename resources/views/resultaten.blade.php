@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <h1>Zoekresultaten</h1>

        <div class="oefentoets_list">
            @foreach ($oefentoetsen as $oefentoets)
                @include('partials._oefentoets_list', ['oefentoets' => $oefentoets, 'vakken' => $vakken, 'gebruikers' => $gebruikers])
            @endforeach
        </div>
    </div>
</main>
@endsection