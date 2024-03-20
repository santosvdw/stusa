@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <h1>Welkom, {{Auth::user()->voornaam}}</h1>
    </div>
</main>
@endsection