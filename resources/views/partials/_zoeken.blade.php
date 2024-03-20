<form action="/zoeken" method="get" class="zoeken">
@csrf
    <select name="course" id="course">
        <option selected disabled >Vak</option>
        @foreach ($vakken as $vak)
        <option value="{{$vak->id}}">{{$vak->vak_afkorting}}</option>
        @endforeach
    </select>
    <input type="text" name="search" id="search" placeholder="Zoek een oefentoets">
    <button type="submit" class="search-btn"><i class="bi bi-search"></i></button>
</form>