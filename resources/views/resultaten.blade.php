<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultaten</title>
</head>
<body>
    @include('partials._navigatie', ['vakken' => $vakken])
    <h1>Zoekresultaten</h1>
    @foreach ($oefentoetsen as $oefentoets)
        @include('partials._oefentoets', ['oefentoets' => $oefentoets, 'vakken' => $vakken])
    @endforeach
</body>
</html>