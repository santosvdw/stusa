<nav>
    <div class="nav-wrapper">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/logo.png')}}" alt="STUSA"></a>
            </div>
            <a href="/oefentoetsen">oefentoetsen</a>
            <a href="/uploaden">uploaden</a>
        @include('partials._zoeken', ['vakken' => $vakken])
            @auth
            <a href="/settings">settings</a>
            <a href="/{{Auth::user()->username}}">profiel</a>
            <form action="/uitloggen" method="post">
                @csrf
                <div class="form-input">
                    <button type="submit" class="submit-btn red nav" value="uitloggen">Uitloggen</button>
                </div>
            </form>
            @else
            <a href="/login">login</a>
            @endauth
    </div>
</nav>