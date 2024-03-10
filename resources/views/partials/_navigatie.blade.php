<nav>
    <a href="/">home</a>
    <a href="/oefentoetsen">oefentoetsen</a>
    <a href="/uploaden">uploaden</a>

    @auth
        <form action="/uitloggen" method="post">
        @csrf
        <input type="submit" value="uitloggen">
        </form>
        <a href="/settings">settings</a>
        <a href="/{{Auth::user()->username}}">profiel</a>
    @else
        <a href="/login">inloggen</a>
        <a href="/registreren/leerling">registreren</a>
    @endauth
    @include('partials._zoeken', ['vakken' => $vakken])
</nav>