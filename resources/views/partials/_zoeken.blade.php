<form action="/zoeken" method="get">
<select name="course" id="course">
    <option selected disabled >Kies een vak</option>
    @foreach ($vakken as $vak)
        <option value="{{$vak->id}}">{{$vak->vak_afkorting}}</option>
    @endforeach
</select>
<input type="text" name="search" id="search">
<button type="submit">Zoeken</button>

</form>