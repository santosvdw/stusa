<div class="list_card">
    <div class="list_card_image">
        <img src="{{asset('assets/list_img.png')}}" alt="document">
    </div>
    <div class="list_card_info">
        <h2>{{$oefentoets->titel}}</h2>
        <div class="list_card_info_details">
            <p>
                @foreach ($vakken as $vak)
                    @if ($vak->id == $oefentoets->vak_id)
                        {{$vak->vak_naam}}
                    @endif
                @endforeach
                    | 
                @foreach ($gebruikers as $gebruiker)
                    @if ($gebruiker->id == $oefentoets->user_id)
                        {{$gebruiker->voornaam}} {{$gebruiker->achternaam}}
                    @endif
                @endforeach
            </p>
        </div>
    </div>
    <div class="list_card_link">
        <a href="/oefentoets/{{$oefentoets->id}}"><i class="bi bi-caret-right-fill icon-button"></i></a>
    </div>
</div>