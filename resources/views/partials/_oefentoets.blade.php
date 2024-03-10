<table style="border-color:black;border-style:solid;border-width:1px;">
    <tr><td><h3>{{$oefentoets->titel}}</h3></td></tr>
    <tr><td>{{$oefentoets->onderwerp}}</td></tr>
    @foreach ($vakken as $vak)
        @if ($vak->id == $oefentoets->vak_id)
            <tr><td>{{$vak->vak_naam}}</td></tr>
            @break
        @endif
    @endforeach
    <tr><td><a href="/oefentoets/{{$oefentoets->id}}">Bekijken</a></td></tr>
</table>