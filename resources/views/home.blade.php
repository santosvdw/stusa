@extends('layouts.app')

@section('content')
<main>
    <div class="wrapper">
        <header>
            <h1>Welkom, {{Auth::user()->voornaam}}</h1>
            <h3>Wat wil je doen vandaag?</h3>
        </header>
        <section class="dashboard">
            <div class="blocks">
                <a class="block" href="/oefentoetsen">
                    <i class="bi bi-box-arrow-up-right"></i>
                    <p>Oefentoetsen bekijken</p>
                </a>
                <a class="block" href="/uploaden">
                    <i class="bi bi-upload"></i>
                    <p>Oefentoets uploaden</p>
                </a>
                <a class="block" href="/zoeken">
                    <i class="bi bi-search"></i>
                    <p>Zoeken</p>
                </a>
            </div>
        </section>
    </div>
</main>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
